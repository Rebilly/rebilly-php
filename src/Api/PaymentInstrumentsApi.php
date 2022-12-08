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
use Rebilly\Sdk\Model\AlternativeInstrument;
use Rebilly\Sdk\Model\BankAccountCreatePlain;
use Rebilly\Sdk\Model\BankAccountUpdatePlain;
use Rebilly\Sdk\Model\PaymentCardCreatePlain;
use Rebilly\Sdk\Model\PaymentCardUpdatePlain;
use Rebilly\Sdk\Model\PaymentInstrumentCreateToken;
use Rebilly\Sdk\Model\PaymentInstrumentUpdateToken;
use Rebilly\Sdk\Model\PayPalAccount;
use Rebilly\Sdk\Paginator;
use TypeError;

class PaymentInstrumentsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return AlternativeInstrument|BankAccount|KhelocardCard|PaymentCard|PayPalAccount
     */
    public function create(
        PaymentInstrumentCreateToken|PaymentCardCreatePlain|BankAccountCreatePlain|PayPalAccount|AlternativeInstrument $body,
    ): PaymentCard|BankAccount|PayPalAccount|KhelocardCard|AlternativeInstrument {
        $uri = '/payment-instruments';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($body));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPaymentInstrumentResponse($data);
    }

    /**
     * @return AlternativeInstrument|BankAccount|KhelocardCard|PaymentCard|PayPalAccount
     */
    public function deactivate(
        string $id,
    ): PaymentCard|BankAccount|PayPalAccount|KhelocardCard|AlternativeInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}/deactivation');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPaymentInstrumentResponse($data);
    }

    /**
     * @return AlternativeInstrument|BankAccount|KhelocardCard|PaymentCard|PayPalAccount
     */
    public function get(
        string $id,
    ): PaymentCard|BankAccount|PayPalAccount|KhelocardCard|AlternativeInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPaymentInstrumentResponse($data);
    }

    /**
     * @return Collection<AlternativeInstrument|BankAccount|KhelocardCard|PaymentCard|PayPalAccount>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'expand' => $expand,
        ];
        $uri = '/payment-instruments?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PaymentCard|BankAccount|PayPalAccount|KhelocardCard|AlternativeInstrument => $this->buildPaymentInstrumentResponse($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            q: $q,
            expand: $expand,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return AlternativeInstrument|BankAccount|KhelocardCard|PaymentCard|PayPalAccount
     */
    public function update(
        string $id,
        PaymentInstrumentUpdateToken|PaymentCardUpdatePlain|BankAccountUpdatePlain $body,
    ): PaymentCard|BankAccount|PayPalAccount|KhelocardCard|AlternativeInstrument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payment-instruments/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($body));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPaymentInstrumentResponse($data);
    }

    protected function buildPaymentInstrumentResponse(array $data): PaymentCard|BankAccount|PayPalAccount|KhelocardCard|AlternativeInstrument
    {
        $candidates = [];

        try {
            $instance = PaymentCard::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = BankAccount::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = PayPalAccount::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = KhelocardCard::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = AlternativeInstrument::from($data);
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
            throw new InvalidArgumentException('Could not instantiate PaymentInstrument response with the given value');
        }

        return $determined[0];
    }
}
