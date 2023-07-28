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
use Rebilly\Sdk\Model\SubscriptionPause;
use Rebilly\Sdk\Paginator;

class SubscriptionPausesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-pauses/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return SubscriptionPause
     */
    public function get(
        string $id,
    ): SubscriptionPause {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-pauses/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionPause::from($data);
    }

    /**
     * @return Collection<SubscriptionPause>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
        ];
        $uri = '/subscription-pauses?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): SubscriptionPause => SubscriptionPause::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return SubscriptionPause
     */
    public function pause(
        SubscriptionPause $subscriptionPause,
    ): SubscriptionPause {
        $uri = '/subscription-pauses';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($subscriptionPause));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionPause::from($data);
    }

    /**
     * @return SubscriptionPause
     */
    public function update(
        string $id,
        ?SubscriptionPause $subscriptionPause = null,
    ): SubscriptionPause {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-pauses/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($subscriptionPause));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionPause::from($data);
    }
}
