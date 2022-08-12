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
use Rebilly\Sdk\Model\Blocklist;

class BlocklistsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Blocklist
     *
     */
    public function create(
        Blocklist $blocklist,
    ): Blocklist {
        $uri = '/blocklists';

        $request = new Request('POST', $uri, body: json_encode($blocklist));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Blocklist::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/blocklists/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Blocklist
     *
     */
    public function get(
        string $id,
    ): Blocklist {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/blocklists/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Blocklist::from($data);
    }

    /**
     * @return Blocklist[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/blocklists' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Blocklist => Blocklist::from($item), $data);
    }

    /**
     * @return Blocklist
     *
     */
    public function update(
        string $id,
        Blocklist $blocklist,
    ): Blocklist {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/blocklists/{id}');

        $request = new Request('PUT', $uri, body: json_encode($blocklist));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Blocklist::from($data);
    }
}
