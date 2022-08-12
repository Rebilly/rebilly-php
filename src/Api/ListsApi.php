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
use Rebilly\Sdk\Model\ValueList;

class ListsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ValueList
     *
     */
    public function create(
        ?ValueList $valueList = null,
    ): ValueList {
        $uri = '/lists';

        $request = new Request('POST', $uri, body: json_encode($valueList));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ValueList::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/lists/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return ValueList[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $fields = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'fields' => $fields,
            'q' => $q,
        ];
        $uri = '/lists' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ValueList => ValueList::from($item), $data);
    }

    /**
     * @return ValueList
     *
     */
    public function getByVersion(
        string $id,
        int $version,
    ): ValueList {
        $pathParams = [
            '{id}' => $id,
            '{version}' => $version,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/lists/{id}/{version}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ValueList::from($data);
    }

    /**
     * @return ValueList
     *
     */
    public function getLatestVersion(
        string $id,
    ): ValueList {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/lists/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ValueList::from($data);
    }

    /**
     * @return ValueList
     *
     */
    public function update(
        string $id,
        ValueList $valueList,
    ): ValueList {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/lists/{id}');

        $request = new Request('PUT', $uri, body: json_encode($valueList));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ValueList::from($data);
    }
}
