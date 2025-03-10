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
use Rebilly\Sdk\Model\AmlCheck;
use Rebilly\Sdk\Model\AmlCheckReview;
use Rebilly\Sdk\Paginator;

class AmlChecksApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function get(
        string $id,
    ): AmlCheck {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/aml-checks/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return AmlCheck::from($data);
    }

    /**
     * @return Collection<AmlCheck>
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
            'sort' => $sort ? implode(',', $sort) : null,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/aml-checks?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): AmlCheck => AmlCheck::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<AmlCheck>
     */
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

    public function review(
        string $id,
        AmlCheckReview $amlCheckReview,
    ): AmlCheck {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/aml-checks/{id}/review');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($amlCheckReview));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return AmlCheck::from($data);
    }

    public function startReview(
        string $id,
    ): AmlCheck {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/aml-checks/{id}/start-review');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return AmlCheck::from($data);
    }

    public function stopReview(
        string $id,
    ): AmlCheck {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/aml-checks/{id}/stop-review');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return AmlCheck::from($data);
    }
}
