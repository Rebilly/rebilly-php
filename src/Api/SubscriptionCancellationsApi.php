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
use Rebilly\Sdk\Model\PatchSubscriptionCancellationRequest;
use Rebilly\Sdk\Model\SubscriptionCancellation;
use Rebilly\Sdk\Paginator;

class SubscriptionCancellationsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return SubscriptionCancellation
     */
    public function create(
        SubscriptionCancellation $subscriptionCancellation,
    ): SubscriptionCancellation {
        $uri = '/subscription-cancellations';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($subscriptionCancellation));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionCancellation::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-cancellations/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return SubscriptionCancellation
     */
    public function get(
        string $id,
    ): SubscriptionCancellation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-cancellations/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionCancellation::from($data);
    }

    /**
     * @return Collection<SubscriptionCancellation>
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
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/subscription-cancellations?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): SubscriptionCancellation => SubscriptionCancellation::from($item), $data),
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
     * @return SubscriptionCancellation
     */
    public function patch(
        string $id,
        PatchSubscriptionCancellationRequest $patchSubscriptionCancellationRequest,
    ): SubscriptionCancellation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-cancellations/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($patchSubscriptionCancellationRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionCancellation::from($data);
    }

    /**
     * @return SubscriptionCancellation
     */
    public function update(
        string $id,
        SubscriptionCancellation $subscriptionCancellation,
    ): SubscriptionCancellation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-cancellations/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($subscriptionCancellation));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionCancellation::from($data);
    }
}
