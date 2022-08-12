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
use Rebilly\Sdk\Model\CreditMemo;
use Rebilly\Sdk\Model\CreditMemoTimeline;

class CreditMemosApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CreditMemo
     */
    public function create(
        CreditMemo $creditMemo,
    ): CreditMemo {
        $uri = '/credit-memos';

        $request = new Request('POST', $uri, body: json_encode($creditMemo));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemo::from($data);
    }

    /**
     * @return CreditMemoTimeline
     */
    public function createTimelineComment(
        string $id,
        CreditMemoTimeline $creditMemoTimeline,
    ): CreditMemoTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}/timeline');

        $request = new Request('POST', $uri, body: json_encode($creditMemoTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemoTimeline::from($data);
    }

    public function deleteTimelineMessage(
        string $id,
        string $messageId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return CreditMemo
     */
    public function get(
        string $id,
        ?string $expand = null,
    ): CreditMemo {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemo::from($data);
    }

    /**
     * @return CreditMemo[]
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): array {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'expand' => $expand,
        ];
        $uri = '/credit-memos' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CreditMemo => CreditMemo::from($item), $data);
    }

    /**
     * @return CreditMemoTimeline[]
     */
    public function getAllTimelineMessages(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CreditMemoTimeline => CreditMemoTimeline::from($item), $data);
    }

    /**
     * @return CreditMemoTimeline
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): CreditMemoTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemoTimeline::from($data);
    }

    /**
     * @return CreditMemo
     */
    public function update(
        string $id,
        CreditMemo $creditMemo,
    ): CreditMemo {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}');

        $request = new Request('PUT', $uri, body: json_encode($creditMemo));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemo::from($data);
    }

    /**
     * @return CreditMemo
     */
    public function void(
        string $id,
    ): CreditMemo {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}/void');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemo::from($data);
    }
}
