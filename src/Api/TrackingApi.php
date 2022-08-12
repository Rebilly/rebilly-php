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

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\ApiTracking;
use Rebilly\Sdk\Model\ValueList;
use Rebilly\Sdk\Model\WebhookTracking;

class TrackingApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ApiTracking[]
     */
    public function getAllApiLogs(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $accept = 'application/json',
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/tracking/api' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ApiTracking => ApiTracking::from($item), $data);
    }

    /**
     * @return ValueList[]
     */
    public function getAllListsChangesHistory(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/tracking/lists' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ValueList => ValueList::from($item), $data);
    }

    /**
     * @return WebhookTracking[]
     */
    public function getAllWebhookTrackingLogs(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/tracking/webhooks' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): WebhookTracking => WebhookTracking::from($item), $data);
    }

    /**
     * @return ApiTracking
     */
    public function getApiLog(
        string $id,
    ): ApiTracking {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tracking/api/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ApiTracking::from($data);
    }

    /**
     * @return WebhookTracking
     */
    public function getWebhookTrackingLog(
        string $id,
    ): WebhookTracking {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tracking/webhooks/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return WebhookTracking::from($data);
    }

    public function resendWebhook(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tracking/webhooks/{id}/resend');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }
}
