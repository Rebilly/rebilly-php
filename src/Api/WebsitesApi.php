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
use Rebilly\Sdk\Model\Website;
use Rebilly\Sdk\Paginator;

class WebsitesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function create(
        Website $website,
    ): Website {
        $uri = '/websites';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($website));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Website::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/websites/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function get(
        string $id,
    ): Website {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/websites/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Website::from($data);
    }

    /**
     * @return Collection<Website>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/websites?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Website => Website::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<Website>
     */
    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            q: $q,
            filter: $filter,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    public function update(
        string $id,
        Website $website,
    ): Website {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/websites/{id}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($website));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Website::from($data);
    }
}
