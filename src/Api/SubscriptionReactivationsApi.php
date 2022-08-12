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
use Rebilly\Sdk\Model\SubscriptionReactivation;

class SubscriptionReactivationsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return SubscriptionReactivation
     *
     */
    public function get(
        string $id,
    ): SubscriptionReactivation {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscription-reactivations/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionReactivation::from($data);
    }

    /**
     * @return SubscriptionReactivation[]
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
        $uri = '/subscription-reactivations' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): SubscriptionReactivation => SubscriptionReactivation::from($item), $data);
    }

    /**
     * @return SubscriptionReactivation
     *
     */
    public function reactivate(
        SubscriptionReactivation $subscriptionReactivation,
    ): SubscriptionReactivation {
        $uri = '/subscription-reactivations';

        $request = new Request('POST', $uri, body: json_encode($subscriptionReactivation));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return SubscriptionReactivation::from($data);
    }
}
