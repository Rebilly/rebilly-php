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
use Rebilly\Sdk\Model\InlineObject;
use Rebilly\Sdk\Model\OrganizationExport;
use Rebilly\Sdk\Paginator;

class OrganizationExportsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return OrganizationExport
     */
    public function create(
        ?InlineObject $inlineObject = null,
    ): OrganizationExport {
        $uri = '/organization-exports';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($inlineObject));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrganizationExport::from($data);
    }

    /**
     * @return OrganizationExport
     */
    public function get(
        string $id,
    ): OrganizationExport {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/organization-exports/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrganizationExport::from($data);
    }

    /**
     * @return Collection<OrganizationExport>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort,
        ];
        $uri = '/organization-exports?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): OrganizationExport => OrganizationExport::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }
}
