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
use InvalidArgumentException;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\OneTimeSalePlan;
use Rebilly\Sdk\Model\SubscriptionOrderPlan;
use Rebilly\Sdk\Model\TrialOnlyPlan;
use Rebilly\Sdk\Paginator;
use TypeError;

class PlansApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan
     */
    public function create(
        OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan $body,
    ): OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan {
        $uri = '/plans';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($body));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPlanResponse($data);
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
     * @return OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan
     */
    public function get(
        string $id,
    ): OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/plans/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPlanResponse($data);
    }

    /**
     * @return Collection<OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan>
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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan => $this->buildPlanResponse($item), $data),
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
     * @return OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan
     */
    public function update(
        string $id,
        OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan $body,
    ): OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/plans/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($body));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return $this->buildPlanResponse($data);
    }

    protected function buildPlanResponse(array $data): OneTimeSalePlan|SubscriptionOrderPlan|TrialOnlyPlan
    {
        $candidates = [];

        try {
            $instance = OneTimeSalePlan::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = SubscriptionOrderPlan::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        try {
            $instance = TrialOnlyPlan::from($data);
            $candidates[] = [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (InvalidArgumentException|TypeError) {
        }

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if ($determined[0] === null) {
            throw new InvalidArgumentException('Could not instantiate Plan response with the given value');
        }

        return $determined[0];
    }
}
