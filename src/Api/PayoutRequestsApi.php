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
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\GetPayoutRequestPaymentInstruments200Response;
use Rebilly\Sdk\Model\PayoutRequest;
use Rebilly\Sdk\Model\PayoutRequestCancellation;
use Rebilly\Sdk\Paginator;

class PayoutRequestsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return PayoutRequest
     */
    public function cancel(
        string $id,
        PayoutRequestCancellation $payoutRequestCancellation,
    ): PayoutRequest {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-requests/{id}/cancel');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($payoutRequestCancellation));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequest::from($data);
    }

    /**
     * @return PayoutRequest
     */
    public function create(
        PayoutRequest $payoutRequest,
    ): PayoutRequest {
        $uri = '/payout-requests';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($payoutRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequest::from($data);
    }

    /**
     * @return PayoutRequest
     */
    public function get(
        string $id,
    ): PayoutRequest {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-requests/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequest::from($data);
    }

    /**
     * @return Collection<PayoutRequest>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/payout-requests?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PayoutRequest => PayoutRequest::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return GetPayoutRequestPaymentInstruments200Response[]
     */
    public function getPaymentInstruments(
        string $id,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-requests/{id}/payment-instruments');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): GetPayoutRequestPaymentInstruments200Response => GetPayoutRequestPaymentInstruments200Response::from($item), $data);
    }

    /**
     * @return PayoutRequest
     */
    public function update(
        string $id,
        ?PayoutRequest $payoutRequest = null,
    ): PayoutRequest {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-requests/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($payoutRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequest::from($data);
    }
}
