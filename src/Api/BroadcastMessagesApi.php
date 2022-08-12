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
use Rebilly\Sdk\Model\BroadcastMessage;

class BroadcastMessagesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return BroadcastMessage
     *
     */
    public function create(
        BroadcastMessage $broadcastMessage,
    ): BroadcastMessage {
        $uri = '/broadcast-messages';

        $request = new Request('POST', $uri, body: json_encode($broadcastMessage));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return BroadcastMessage::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/broadcast-messages/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return BroadcastMessage
     *
     */
    public function get(
        string $id,
    ): BroadcastMessage {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/broadcast-messages/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return BroadcastMessage::from($data);
    }

    /**
     * @return BroadcastMessage[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
        ];
        $uri = '/broadcast-messages' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): BroadcastMessage => BroadcastMessage::from($item), $data);
    }

    /**
     * @return BroadcastMessage
     *
     */
    public function update(
        string $id,
        BroadcastMessage $broadcastMessage,
    ): BroadcastMessage {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/broadcast-messages/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($broadcastMessage));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return BroadcastMessage::from($data);
    }
}
