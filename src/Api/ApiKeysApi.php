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
use Rebilly\Sdk\Model\ApiKey;

class ApiKeysApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ApiKey
     */
    public function create(
        ApiKey $apiKey,
    ): ApiKey {
        $uri = '/api-keys';

        $request = new Request('POST', $uri, body: json_encode($apiKey));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ApiKey::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/api-keys/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return ApiKey
     */
    public function get(
        string $id,
    ): ApiKey {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/api-keys/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ApiKey::from($data);
    }

    /**
     * @return ApiKey[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
        ];
        $uri = '/api-keys' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ApiKey => ApiKey::from($item), $data);
    }

    /**
     * @return ApiKey
     */
    public function update(
        string $id,
        ApiKey $apiKey,
    ): ApiKey {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/api-keys/{id}');

        $request = new Request('PUT', $uri, body: json_encode($apiKey));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ApiKey::from($data);
    }
}
