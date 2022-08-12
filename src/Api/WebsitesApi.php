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
use Rebilly\Sdk\Model\Website;

class WebsitesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Website
     */
    public function create(
        Website $website,
    ): Website {
        $uri = '/websites';

        $request = new Request('POST', $uri, body: json_encode($website));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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

    /**
     * @return Website
     */
    public function get(
        string $id,
    ): Website {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/websites/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Website::from($data);
    }

    /**
     * @return Website[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $filter = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'filter' => $filter,
            'sort' => $sort,
        ];
        $uri = '/websites' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Website => Website::from($item), $data);
    }

    /**
     * @return Website
     */
    public function update(
        string $id,
        Website $website,
    ): Website {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/websites/{id}');

        $request = new Request('PUT', $uri, body: json_encode($website));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Website::from($data);
    }
}
