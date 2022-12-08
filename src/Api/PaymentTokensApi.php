<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Utils;
use InvalidArgumentException;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\CompositeToken;
use Rebilly\Sdk\Paginator;
use TypeError;

class PaymentTokensApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return AlternativePaymentToken|BankAccountToken|DigitalWalletToken|KhelocardCardToken|KlarnaToken|PaymentCardToken|PayPalToken|PlaidAccountToken
     */
    public function create(
        CompositeToken $compositeToken,
    ): PaymentCardToken|PayPalToken|BankAccountToken|DigitalWalletToken|PlaidAccountToken|KhelocardCardToken|KlarnaToken|AlternativePaymentToken {
        $uri = '/tokens';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($compositeToken));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildCompositeTokenResponse($data);
    }

    /**
     * @return AlternativePaymentToken|BankAccountToken|DigitalWalletToken|KhelocardCardToken|KlarnaToken|PaymentCardToken|PayPalToken|PlaidAccountToken
     */
    public function get(
        string $token,
    ): PaymentCardToken|PayPalToken|BankAccountToken|DigitalWalletToken|PlaidAccountToken|KhelocardCardToken|KlarnaToken|AlternativePaymentToken {
        $pathParams = [
            '{token}' => $token,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tokens/{token}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildCompositeTokenResponse($data);
    }

    /**
     * @return Collection<AlternativePaymentToken|BankAccountToken|DigitalWalletToken|KhelocardCardToken|KlarnaToken|PaymentCardToken|PayPalToken|PlaidAccountToken>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/tokens?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PaymentCardToken|PayPalToken|BankAccountToken|DigitalWalletToken|PlaidAccountToken|KhelocardCardToken|KlarnaToken|AlternativePaymentToken => $this->buildCompositeTokenResponse($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    protected function buildCompositeTokenResponse(array $data): PaymentCardToken|PayPalToken|BankAccountToken|DigitalWalletToken|PlaidAccountToken|KhelocardCardToken|KlarnaToken|AlternativePaymentToken
    {
        $candidates = [];

        try {
            $instance = PaymentCardToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = PayPalToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = BankAccountToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = DigitalWalletToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = PlaidAccountToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = KhelocardCardToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = KlarnaToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = AlternativePaymentToken::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if ($determined[0] === null) {
            throw new InvalidArgumentException('Could not instantiate CompositeToken response with the given value');
        }

        return $determined[0];
    }
}
