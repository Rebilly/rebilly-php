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

use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\DataExport;
use Rebilly\Sdk\Paginator;

class DataExportsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/data-exports/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return DataExport
     */
    public function get(
        string $id,
        ?string $expand = null,
    ): DataExport {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/data-exports/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return DataExport::from($data);
    }

    /**
     * @return Collection<DataExport>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $expand = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $criteria = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'expand' => $expand,
            'filter' => $filter,
            'q' => $q,
            'criteria' => $criteria,
        ];
        $uri = '/experimental/data-exports?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): DataExport => DataExport::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $expand = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $criteria = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            sort: $sort,
            expand: $expand,
            filter: $filter,
            q: $q,
            criteria: $criteria,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return DataExport
     */
    public function queue(
        DataExport $dataExport,
        ?string $expand = null,
    ): DataExport {
        $queryParams = [
            'expand' => $expand,
        ];
        $uri = '/experimental/data-exports?' . http_build_query($queryParams);

        $request = new Request('POST', $uri, body: json_encode($dataExport));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return DataExport::from($data);
    }

    /**
     * @return DataExport
     */
    public function update(
        string $id,
        DataExport $dataExport,
        ?string $expand = null,
    ): DataExport {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/data-exports/{id}?') . http_build_query($queryParams);

        $request = new Request('PUT', $uri, body: json_encode($dataExport));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return DataExport::from($data);
    }
}
