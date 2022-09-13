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
use Rebilly\Sdk\Model\BillingPortal;
use Rebilly\Sdk\Paginator;

class BillingPortalsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return BillingPortal
     */
    public function create(
        ?BillingPortal $billingPortal = null,
    ): BillingPortal {
        $uri = '/billing-portals';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($billingPortal));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return BillingPortal::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/billing-portals/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return BillingPortal
     */
    public function get(
        string $id,
    ): BillingPortal {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/billing-portals/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return BillingPortal::from($data);
    }

    /**
     * @return Collection<BillingPortal>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/billing-portals?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): BillingPortal => BillingPortal::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            sort: $sort,
            filter: $filter,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return BillingPortal
     */
    public function update(
        string $id,
        ?BillingPortal $billingPortal = null,
    ): BillingPortal {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/billing-portals/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($billingPortal));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return BillingPortal::from($data);
    }
}
