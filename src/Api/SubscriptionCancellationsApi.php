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
use Rebilly\Sdk\Model\SubscriptionCancellation;

class SubscriptionCancellationsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return SubscriptionCancellation
     */
    public function create(
        SubscriptionCancellation $subscriptionCancellation,
    ): SubscriptionCancellation {
        $uri = '/subscription-cancellations';

        $request = new Request('POST', $uri, body: json_encode($subscriptionCancellation));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionCancellation::from($data);
    }

    /**
     * @return SubscriptionCancellation[]
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
        $uri = '/subscription-cancellations' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): SubscriptionCancellation => SubscriptionCancellation::from($item), $data);
    }

    /**
     * @return SubscriptionCancellation
     */
    public function patch(
        string $id,
        SubscriptionCancellation $subscriptionCancellation,
    ): SubscriptionCancellation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-cancellations/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($subscriptionCancellation));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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

        $request = new Request('PUT', $uri, body: json_encode($subscriptionCancellation));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionCancellation::from($data);
    }
}
