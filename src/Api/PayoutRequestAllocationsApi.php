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
use Rebilly\Sdk\Model\PatchPayoutRequestAllocationRequest;
use Rebilly\Sdk\Model\PayoutRequestAllocation;
use Rebilly\Sdk\Model\PostPayoutRequestAllocationRequest;
use Rebilly\Sdk\Model\PostPayoutRequestAllocationsProcessRequest;
use Rebilly\Sdk\Model\PostPayoutRequestAutoAllocationRequest;
use Rebilly\Sdk\Paginator;

class PayoutRequestAllocationsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function autoAllocate(
        PostPayoutRequestAutoAllocationRequest $postPayoutRequestAutoAllocationRequest,
    ): void {
        $uri = '/payout-request-allocations/auto';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postPayoutRequestAutoAllocationRequest));
        $this->client->send($request);
    }

    public function create(
        PostPayoutRequestAllocationRequest $postPayoutRequestAllocationRequest,
    ): PayoutRequestAllocation {
        $uri = '/payout-request-allocations';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($postPayoutRequestAllocationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestAllocation::from($data);
    }

    public function get(
        string $id,
    ): PayoutRequestAllocation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-allocations/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestAllocation::from($data);
    }

    /**
     * @return Collection<PayoutRequestAllocation>
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
        $uri = '/payout-request-allocations?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): PayoutRequestAllocation => PayoutRequestAllocation::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<PayoutRequestAllocation>
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

    public function process(
        PostPayoutRequestAllocationsProcessRequest $postPayoutRequestAllocationsProcessRequest,
    ): void {
        $uri = '/payout-request-allocations/process';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postPayoutRequestAllocationsProcessRequest));
        $this->client->send($request);
    }

    public function update(
        string $id,
        PatchPayoutRequestAllocationRequest $patchPayoutRequestAllocationRequest,
    ): PayoutRequestAllocation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/payout-request-allocations/{id}');

        $request = new Request('PATCH', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($patchPayoutRequestAllocationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return PayoutRequestAllocation::from($data);
    }
}
