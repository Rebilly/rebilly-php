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
use Rebilly\Sdk\Model\GetPayoutRequestBatchPreviewResponse;
use Rebilly\Sdk\Model\PayoutRequestBatch;
use Rebilly\Sdk\Model\PostPayoutRequestBatchBlockRequest;
use Rebilly\Sdk\Model\PostPayoutRequestBatchRequest;
use Rebilly\Sdk\Paginator;

class PayoutRequestBatchesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function approve(
        string $id,
    ): PayoutRequestBatch {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-batches/{id}/approve');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestBatch::from($data, ['headers' => $response->getHeaders()]);
    }

    public function autoAllocate(
        string $id,
    ): PayoutRequestBatch {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-batches/{id}/auto-allocate');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestBatch::from($data, ['headers' => $response->getHeaders()]);
    }

    public function block(
        string $id,
        PostPayoutRequestBatchBlockRequest $postPayoutRequestBatchBlockRequest,
    ): PayoutRequestBatch {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-batches/{id}/block');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestBatchBlockRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestBatch::from($data, ['headers' => $response->getHeaders()]);
    }

    public function create(
        PostPayoutRequestBatchRequest $postPayoutRequestBatchRequest,
    ): PayoutRequestBatch {
        $uri = '/payout-request-batches';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestBatchRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestBatch::from($data, ['headers' => $response->getHeaders()]);
    }

    public function get(
        string $id,
    ): PayoutRequestBatch {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-batches/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestBatch::from($data, ['headers' => $response->getHeaders()]);
    }

    /**
     * @return Collection<PayoutRequestBatch>
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
        $uri = '/payout-request-batches?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PayoutRequestBatch => PayoutRequestBatch::from($item, ['headers' => $response->getHeaders()]), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
            [
                'headers' => $response->getHeaders(),
            ]
        );
    }

    /**
     * @return Paginator<PayoutRequestBatch>
     */
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

    public function preview(
        ?string $filter = null,
    ): GetPayoutRequestBatchPreviewResponse {
        $queryParams = [
            'filter' => $filter,
        ];
        $uri = '/payout-request-batches/preview?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GetPayoutRequestBatchPreviewResponse::from($data, ['headers' => $response->getHeaders()]);
    }
}
