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
use Rebilly\Sdk\Model\ExternalIdentifier;
use Rebilly\Sdk\Paginator;

class ExternalIdentifiersApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function delete(
        string $resource,
        string $resourceId,
        string $service,
    ): void {
        $pathParams = [
            '{resource}' => $resource,
            '{resourceId}' => $resourceId,
            '{service}' => $service,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/{resource}/{resourceId}/external-identifiers/{service}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return ExternalIdentifier
     */
    public function get(
        string $resource,
        string $resourceId,
        string $service,
    ): ExternalIdentifier {
        $pathParams = [
            '{resource}' => $resource,
            '{resourceId}' => $resourceId,
            '{service}' => $service,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/{resource}/{resourceId}/external-identifiers/{service}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ExternalIdentifier::from($data);
    }

    /**
     * @return Collection<ExternalIdentifier>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/external-identifiers?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): ExternalIdentifier => ExternalIdentifier::from($item), $data),
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

    public function sync(
        string $resource,
        string $resourceId,
        string $service,
    ): void {
        $pathParams = [
            '{resource}' => $resource,
            '{resourceId}' => $resourceId,
            '{service}' => $service,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/{resource}/{resourceId}/external-identifiers/{service}');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    /**
     * @return ExternalIdentifier
     */
    public function update(
        string $resource,
        string $resourceId,
        string $service,
        ExternalIdentifier $externalIdentifier,
    ): ExternalIdentifier {
        $pathParams = [
            '{resource}' => $resource,
            '{resourceId}' => $resourceId,
            '{service}' => $service,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/{resource}/{resourceId}/external-identifiers/{service}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($externalIdentifier));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return ExternalIdentifier::from($data);
    }
}
