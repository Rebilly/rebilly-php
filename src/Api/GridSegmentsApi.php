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
use Rebilly\Sdk\Model\Segment;

class GridSegmentsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Segment
     */
    public function create(
        Segment $segment,
    ): Segment {
        $uri = '/grid-segments';

        $request = new Request('POST', $uri, body: json_encode($segment));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
        $data = json_decode((string) $response->getBody(), true);

        return Segment::from($data);
    }

    /**
     * @return Segment[]
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
        $uri = '/grid-segments' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Segment => Segment::from($item), $data);
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

        $request = new Request('PUT', $uri, body: json_encode($segment));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Segment::from($data);
    }
}
