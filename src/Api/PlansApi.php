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
use Rebilly\Sdk\Model\Plan;

class PlansApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Plan
     */
    public function create(
        Plan $plan,
    ): Plan {
        $uri = '/plans';

        $request = new Request('POST', $uri, body: json_encode($plan));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Plan::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/plans/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Plan
     */
    public function get(
        string $id,
    ): Plan {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/plans/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Plan::from($data);
    }

    /**
     * @return Plan[]
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
        ];
        $uri = '/plans' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Plan => Plan::from($item), $data);
    }

    /**
     * @return Plan
     */
    public function update(
        string $id,
        Plan $plan,
    ): Plan {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/plans/{id}');

        $request = new Request('PUT', $uri, body: json_encode($plan));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Plan::from($data);
    }
}
