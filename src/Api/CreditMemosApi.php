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
use Rebilly\Sdk\Model\CommonCreditMemo;
use Rebilly\Sdk\Model\CreditMemo;
use Rebilly\Sdk\Model\CreditMemoTimeline;
use Rebilly\Sdk\Paginator;

class CreditMemosApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return CreditMemo
     */
    public function create(
        CreditMemo $creditMemo,
    ): CreditMemo {
        $uri = '/credit-memos';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($creditMemo));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

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

        $request = new Request('POST', $uri, body: Utils::jsonEncode($creditMemoTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CreditMemo::from($data);
    }

    /**
     * @return Collection<CreditMemo>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
            'expand' => $expand,
        ];
        $uri = '/credit-memos?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CreditMemo => CreditMemo::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
        ?string $expand = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            q: $q,
            expand: $expand,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<CreditMemoTimeline>
     */
    public function getAllTimelineMessages(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Collection {
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}/timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CreditMemoTimeline => CreditMemoTimeline::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllTimelineMessagesPaginator(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllTimelineMessages(
            id: $id,
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CreditMemoTimeline::from($data);
    }

    /**
     * @return CreditMemo
     */
    public function patch(
        string $id,
        CommonCreditMemo $commonCreditMemo,
    ): CreditMemo {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credit-memos/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($commonCreditMemo));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CreditMemo::from($data);
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

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($creditMemo));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

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
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CreditMemo::from($data);
    }
}
