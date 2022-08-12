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
use Rebilly\Sdk\Model\SubscriptionPause;

class SubscriptionPausesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
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
     *
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
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionPause::from($data);
    }

    /**
     * @return SubscriptionPause[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
        ];
        $uri = '/subscription-pauses' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): SubscriptionPause => SubscriptionPause::from($item), $data);
    }

    /**
     * @return SubscriptionPause
     *
     */
    public function pause(
        SubscriptionPause $subscriptionPause,
    ): SubscriptionPause {
        $uri = '/subscription-pauses';

        $request = new Request('POST', $uri, body: json_encode($subscriptionPause));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionPause::from($data);
    }

    /**
     * @return SubscriptionPause
     *
     */
    public function update(
        string $id,
        ?SubscriptionPause $subscriptionPause = null,
    ): SubscriptionPause {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-pauses/{id}');

        $request = new Request('PUT', $uri, body: json_encode($subscriptionPause));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionPause::from($data);
    }
}
