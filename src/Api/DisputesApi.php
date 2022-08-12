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
use Rebilly\Sdk\Model\Dispute;

class DisputesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Dispute
     */
    public function create(
        Dispute $dispute,
    ): Dispute {
        $uri = '/disputes';

        $request = new Request('POST', $uri, body: json_encode($dispute));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Dispute::from($data);
    }

    /**
     * @return Dispute
     */
    public function get(
        string $id,
    ): Dispute {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/disputes/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Dispute::from($data);
    }

    /**
     * @return Dispute[]
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): array {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'expand' => $expand,
        ];
        $uri = '/disputes' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Dispute => Dispute::from($item), $data);
    }

    /**
     * @return Dispute
     */
    public function update(
        string $id,
        Dispute $dispute,
    ): Dispute {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/disputes/{id}');

        $request = new Request('PUT', $uri, body: json_encode($dispute));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Dispute::from($data);
    }
}
