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
use Rebilly\Sdk\Model\Usage;
use Rebilly\Sdk\Paginator;

class UsagesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Usage
     */
    public function create(
        Usage $usage,
    ): Usage {
        $uri = '/usages';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($usage));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Usage::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/usages/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Usage
     */
    public function get(
        string $id,
    ): Usage {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/usages/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Usage::from($data);
    }

    /**
     * @return Collection<Usage>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
        ];
        $uri = '/usages?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Usage => Usage::from($item), $data),
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
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Usage
     */
    public function update(
        string $id,
        Usage $usage,
    ): Usage {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/usages/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($usage));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Usage::from($data);
    }
}
