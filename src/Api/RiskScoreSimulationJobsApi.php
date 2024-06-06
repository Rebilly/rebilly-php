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
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\RiskScoreSimulationJob;
use Rebilly\Sdk\Model\RiskScoreSimulationTransaction;
use Rebilly\Sdk\Paginator;

class RiskScoreSimulationJobsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function create(
        RiskScoreSimulationJob $riskScoreSimulationJob,
    ): RiskScoreSimulationJob {
        $uri = '/risk-score-simulation-jobs';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($riskScoreSimulationJob));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreSimulationJob::from($data);
    }

    public function get(
        string $id,
    ): RiskScoreSimulationJob {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/risk-score-simulation-jobs/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreSimulationJob::from($data);
    }

    /**
     * @return Collection<RiskScoreSimulationJob>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/risk-score-simulation-jobs?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): RiskScoreSimulationJob => RiskScoreSimulationJob::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<RiskScoreSimulationJob>
     */
    public function getAllPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<RiskScoreSimulationTransaction>
     */
    public function getTransactions(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/risk-score-simulation-jobs/{id}/transactions?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): RiskScoreSimulationTransaction => RiskScoreSimulationTransaction::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<RiskScoreSimulationTransaction>
     */
    public function getTransactionsPaginator(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getTransactions(
            id: $id,
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    public function stop(
        string $id,
    ): RiskScoreSimulationJob {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/risk-score-simulation-jobs/{id}/stop');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return RiskScoreSimulationJob::from($data);
    }
}
