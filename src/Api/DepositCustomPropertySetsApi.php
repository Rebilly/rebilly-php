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
use Rebilly\Sdk\Model\DepositCustomPropertySet;
use Rebilly\Sdk\Paginator;

class DepositCustomPropertySetsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return DepositCustomPropertySet
     */
    public function create(
        DepositCustomPropertySet $depositCustomPropertySet,
    ): DepositCustomPropertySet {
        $uri = '/deposit-custom-property-sets';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($depositCustomPropertySet));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DepositCustomPropertySet::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/deposit-custom-property-sets/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return DepositCustomPropertySet
     */
    public function get(
        string $id,
    ): DepositCustomPropertySet {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/deposit-custom-property-sets/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DepositCustomPropertySet::from($data);
    }

    /**
     * @return Collection<DepositCustomPropertySet>
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
        $uri = '/deposit-custom-property-sets?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): DepositCustomPropertySet => DepositCustomPropertySet::from($item), $data),
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
     * @return DepositCustomPropertySet
     */
    public function update(
        string $id,
        DepositCustomPropertySet $depositCustomPropertySet,
    ): DepositCustomPropertySet {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/deposit-custom-property-sets/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($depositCustomPropertySet));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return DepositCustomPropertySet::from($data);
    }
}
