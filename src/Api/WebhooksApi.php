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
use Rebilly\Sdk\Model\GlobalWebhook;

class WebhooksApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return GlobalWebhook
     */
    public function create(
        GlobalWebhook $globalWebhook,
    ): GlobalWebhook {
        $uri = '/webhooks';

        $request = new Request('POST', $uri, body: json_encode($globalWebhook));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GlobalWebhook::from($data);
    }

    /**
     * @return GlobalWebhook
     */
    public function get(
        string $id,
    ): GlobalWebhook {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/webhooks/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GlobalWebhook::from($data);
    }

    /**
     * @return GlobalWebhook[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/webhooks' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): GlobalWebhook => GlobalWebhook::from($item), $data);
    }

    /**
     * @return GlobalWebhook
     */
    public function update(
        string $id,
        GlobalWebhook $globalWebhook,
    ): GlobalWebhook {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/webhooks/{id}');

        $request = new Request('PUT', $uri, body: json_encode($globalWebhook));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return GlobalWebhook::from($data);
    }
}
