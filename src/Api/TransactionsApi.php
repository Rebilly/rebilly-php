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
use Rebilly\Sdk\Model\PatchTransactionRequest;
use Rebilly\Sdk\Model\PostTransactionRequest;
use Rebilly\Sdk\Model\Transaction;
use Rebilly\Sdk\Model\TransactionQuery;
use Rebilly\Sdk\Model\TransactionRefund;
use Rebilly\Sdk\Model\TransactionTimeline;
use Rebilly\Sdk\Model\TransactionUpdate;
use Rebilly\Sdk\Paginator;

class TransactionsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Transaction
     */
    public function create(
        PostTransactionRequest $postTransactionRequest,
        ?string $expand = null,
    ): Transaction {
        $queryParams = [
            'expand' => $expand,
        ];
        $uri = '/transactions?' . http_build_query($queryParams);

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postTransactionRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return TransactionTimeline
     */
    public function createTimelineComment(
        string $id,
        TransactionTimeline $transactionTimeline,
    ): TransactionTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/timeline');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($transactionTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TransactionTimeline::from($data);
    }

    public function deleteTimelineMessage(
        string $id,
        string $messageId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Transaction
     */
    public function get(
        string $id,
        ?string $expand = null,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return Collection<Transaction>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
        ?string $expand = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort ? implode(',', $sort) : null,
            'expand' => $expand,
        ];
        $uri = '/transactions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Transaction => Transaction::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
        ?string $expand = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            sort: $sort,
            expand: $expand,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<TransactionTimeline>
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
            'sort' => $sort ? implode(',', $sort) : null,
            'q' => $q,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): TransactionTimeline => TransactionTimeline::from($item), $data),
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
     * @return TransactionTimeline
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): TransactionTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TransactionTimeline::from($data);
    }

    /**
     * @return Transaction
     */
    public function patch(
        string $id,
        PatchTransactionRequest $patchTransactionRequest,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($patchTransactionRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return TransactionQuery
     */
    public function query(
        string $id,
    ): TransactionQuery {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/query');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return TransactionQuery::from($data);
    }

    /**
     * @return Transaction
     */
    public function refund(
        string $id,
        TransactionRefund $transactionRefund,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/refund');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($transactionRefund));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return Transaction
     */
    public function update(
        string $id,
        TransactionUpdate $transactionUpdate,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/update');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($transactionUpdate));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Transaction::from($data);
    }
}
