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
use Rebilly\Sdk\Model\PatchTransactionRequest;
use Rebilly\Sdk\Model\Transaction;
use Rebilly\Sdk\Model\TransactionQuery;
use Rebilly\Sdk\Model\TransactionRefund;
use Rebilly\Sdk\Model\TransactionRequest;
use Rebilly\Sdk\Model\TransactionTimeline;
use Rebilly\Sdk\Model\TransactionUpdate;

class TransactionsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Transaction
     *
     */
    public function create(
        TransactionRequest $transactionRequest,
        ?string $expand = null,
    ): Transaction {
        $queryParams = [
            'expand' => $expand,
        ];
        $uri = '/transactions' . '?' . http_build_query($queryParams);

        $request = new Request('POST', $uri, body: json_encode($transactionRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return TransactionTimeline
     *
     */
    public function createTimelineComment(
        string $id,
        TransactionTimeline $transactionTimeline,
    ): TransactionTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/timeline');

        $request = new Request('POST', $uri, body: json_encode($transactionTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
     *
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return Transaction[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
        ?string $expand = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort,
            'expand' => $expand,
        ];
        $uri = '/transactions' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Transaction => Transaction::from($item), $data);
    }

    /**
     * @return TransactionTimeline[]
     *
     */
    public function getAllTimelineMessages(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): TransactionTimeline => TransactionTimeline::from($item), $data);
    }

    /**
     * @return TransactionTimeline
     *
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
        $data = json_decode((string) $response->getBody(), true);

        return TransactionTimeline::from($data);
    }

    /**
     * @return Transaction
     *
     */
    public function patch(
        string $id,
        PatchTransactionRequest $patchTransactionRequest,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($patchTransactionRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return TransactionQuery
     *
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
        $data = json_decode((string) $response->getBody(), true);

        return TransactionQuery::from($data);
    }

    /**
     * @return Transaction
     *
     */
    public function refund(
        string $id,
        TransactionRefund $transactionRefund,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/refund');

        $request = new Request('POST', $uri, body: json_encode($transactionRefund));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Transaction::from($data);
    }

    /**
     * @return Transaction
     *
     */
    public function update(
        string $id,
        TransactionUpdate $transactionUpdate,
    ): Transaction {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/transactions/{id}/update');

        $request = new Request('POST', $uri, body: json_encode($transactionUpdate));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Transaction::from($data);
    }
}
