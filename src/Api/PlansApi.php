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
use Rebilly\Sdk\Model\OneTimeSalePlan;
use Rebilly\Sdk\Model\Plan;
use Rebilly\Sdk\Model\SubscriptionOrderPlan;
use Rebilly\Sdk\Model\TrialOnlyPlan;
use Rebilly\Sdk\Paginator;

class PlansApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Plan
     */
    public function create(
        OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan $body,
    ): Plan {
        $uri = '/plans';

        $request = new Request('POST', $uri, body: json_encode($body));
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
     * @return Collection<Plan>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
        ];
        $uri = '/plans?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Plan => Plan::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Plan
     */
    public function update(
        string $id,
        OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan $body,
    ): Plan {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/plans/{id}');

        $request = new Request('PUT', $uri, body: json_encode($body));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Plan::from($data);
    }
}
