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
use Rebilly\Sdk\Model\Membership;
use Rebilly\Sdk\Paginator;

class MembershipsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function delete(
        string $organizationId,
        string $userId,
    ): void {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function get(
        string $organizationId,
        string $userId,
    ): Membership {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Membership::from($data);
    }

    /**
     * @return Collection<Membership>
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
        $uri = '/memberships?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Membership => Membership::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<Membership>
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

    public function update(
        string $organizationId,
        string $userId,
        Membership $membership,
    ): Membership {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($membership));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Membership::from($data);
    }
}
