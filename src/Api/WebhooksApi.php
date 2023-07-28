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
use Rebilly\Sdk\Model\GlobalWebhook;
use Rebilly\Sdk\Paginator;

class WebhooksApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return GlobalWebhook
     */
    public function create(
        GlobalWebhook $globalWebhook,
    ): GlobalWebhook {
        $uri = '/webhooks';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($globalWebhook));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GlobalWebhook::from($data);
    }

    /**
     * @return Collection<GlobalWebhook>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = '/webhooks?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): GlobalWebhook => GlobalWebhook::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
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

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($globalWebhook));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return GlobalWebhook::from($data);
    }
}
