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
use Rebilly\Sdk\Model\Fee;
use Rebilly\Sdk\Model\FeePatch;
use Rebilly\Sdk\Paginator;

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

        $request = new Request('POST', $uri, body: Utils::jsonEncode($fee));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Fee::from($data);
    }

    /**
     * @return Collection<Fee>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/fees?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Fee => Fee::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
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

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($feePatch));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

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

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($fee));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Fee::from($data);
    }
}
