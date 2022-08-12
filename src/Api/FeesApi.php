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
use Rebilly\Sdk\Model\Fee;
use Rebilly\Sdk\Model\FeePatch;

class FeesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Fee
     */
    public function create(
        Fee $fee,
    ): Fee {
        $uri = '/fees';

        $request = new Request('POST', $uri, body: json_encode($fee));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Fee::from($data);
    }

    /**
     * @return Fee
     */
    public function get(
        string $id,
    ): Fee {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/fees/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Fee::from($data);
    }

    /**
     * @return Fee[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/fees' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Fee => Fee::from($item), $data);
    }

    /**
     * @return Fee
     */
    public function patch(
        string $id,
        FeePatch $feePatch,
    ): Fee {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/fees/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($feePatch));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Fee::from($data);
    }

    /**
     * @return Fee
     */
    public function upsert(
        string $id,
        Fee $fee,
    ): Fee {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/fees/{id}');

        $request = new Request('PUT', $uri, body: json_encode($fee));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Fee::from($data);
    }
}
