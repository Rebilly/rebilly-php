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
use Rebilly\Sdk\Model\GoogleSpreadsheet;
use Rebilly\Sdk\Model\PatchServiceCredentialRequest;
use Rebilly\Sdk\Model\PostServiceCredentialRequest;
use Rebilly\Sdk\Model\ServiceCredential;
use Rebilly\Sdk\Model\ServiceCredentialFactory;
use Rebilly\Sdk\Paginator;

class ServiceCredentialsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return ServiceCredential
     */
    public function create(
        string $type,
        PostServiceCredentialRequest $postServiceCredentialRequest,
    ): ServiceCredential {
        $pathParams = [
            '{type}' => $type,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/service-credentials/{type}');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postServiceCredentialRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ServiceCredentialFactory::from($data);
    }

    /**
     * @return ServiceCredential
     */
    public function get(
        string $type,
        string $id,
    ): ServiceCredential {
        $pathParams = [
            '{type}' => $type,
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/service-credentials/{type}/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ServiceCredentialFactory::from($data);
    }

    /**
     * @return Collection<ServiceCredential>
     */
    public function getAll(
        string $type,
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
        $pathParams = [
            '{type}' => $type,
        ];

        $queryParams = [
            'filter' => $filter,
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort ? implode(',', $sort) : null,
            'q' => $q,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/service-credentials/{type}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): ServiceCredential => ServiceCredentialFactory::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        string $type,
        ?string $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            type: $type,
            filter: $filter,
            limit: $limit,
            offset: $offset,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<GoogleSpreadsheet>
     */
    public function getItems(
        string $type,
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Collection {
        $pathParams = [
            '{type}' => $type,
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'fields' => $fields,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/service-credentials/{type}/{id}/items?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): GoogleSpreadsheet => GoogleSpreadsheet::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getItemsPaginator(
        string $type,
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getItems(
            type: $type,
            id: $id,
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            fields: $fields,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return ServiceCredential
     */
    public function update(
        string $type,
        string $id,
        PatchServiceCredentialRequest $patchServiceCredentialRequest,
    ): ServiceCredential {
        $pathParams = [
            '{type}' => $type,
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/service-credentials/{type}/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($patchServiceCredentialRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ServiceCredentialFactory::from($data);
    }
}
