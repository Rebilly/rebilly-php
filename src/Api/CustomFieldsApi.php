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
use Rebilly\Sdk\Model\CustomField;
use Rebilly\Sdk\Model\CustomFieldFactory;
use Rebilly\Sdk\Paginator;

class CustomFieldsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function create(
        string $resource,
        string $name,
        CustomField $customField,
    ): CustomField {
        $pathParams = [
            '{resource}' => $resource,
            '{name}' => $name,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-fields/{resource}/{name}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($customField));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CustomFieldFactory::from($data);
    }

    public function get(
        string $resource,
        string $name,
    ): CustomField {
        $pathParams = [
            '{resource}' => $resource,
            '{name}' => $name,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-fields/{resource}/{name}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CustomFieldFactory::from($data);
    }

    /**
     * @return Collection<CustomField>
     */
    public function getAll(
        string $resource,
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $pathParams = [
            '{resource}' => $resource,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-fields/{resource}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CustomField => CustomFieldFactory::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<CustomField>
     */
    public function getAllPaginator(
        string $resource,
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            resource: $resource,
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }
}
