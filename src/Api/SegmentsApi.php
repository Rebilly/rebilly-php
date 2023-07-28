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
use Rebilly\Sdk\Model\Segment;
use Rebilly\Sdk\Paginator;

class SegmentsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Segment
     */
    public function create(
        Segment $segment,
    ): Segment {
        $uri = '/grid-segments';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($segment));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Segment::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/grid-segments/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Segment
     */
    public function get(
        string $id,
    ): Segment {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/grid-segments/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Segment::from($data);
    }

    /**
     * @return Collection<Segment>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/grid-segments?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Segment => Segment::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            sort: $sort,
            filter: $filter,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Segment
     */
    public function update(
        string $id,
        ?Segment $segment = null,
    ): Segment {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/grid-segments/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($segment));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Segment::from($data);
    }
}
