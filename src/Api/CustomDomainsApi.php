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
use Rebilly\Sdk\Model\CustomDomain;
use Rebilly\Sdk\Paginator;

class CustomDomainsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomDomain
     */
    public function create(
        ?CustomDomain $customDomain = null,
    ): CustomDomain {
        $uri = '/custom-domains';

        $request = new Request('POST', $uri, body: json_encode($customDomain));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomDomain::from($data);
    }

    public function delete(
        string $domain,
    ): void {
        $pathParams = [
            '{domain}' => $domain,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-domains/{domain}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return CustomDomain
     */
    public function get(
        string $domain,
    ): CustomDomain {
        $pathParams = [
            '{domain}' => $domain,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-domains/{domain}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomDomain::from($data);
    }

    /**
     * @return Collection<CustomDomain>
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
        $uri = '/custom-domains?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CustomDomain => CustomDomain::from($item), $data),
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
}
