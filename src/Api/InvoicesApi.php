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
use Rebilly\Sdk\Model\CreditMemoAllocation;
use Rebilly\Sdk\Model\Invoice;
use Rebilly\Sdk\Model\InvoiceIssue;
use Rebilly\Sdk\Model\InvoiceItem;
use Rebilly\Sdk\Model\InvoiceReissue;
use Rebilly\Sdk\Model\InvoiceTimeline;
use Rebilly\Sdk\Model\InvoiceTransaction;
use Rebilly\Sdk\Model\InvoiceTransactionAllocation;

class InvoicesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Invoice
     */
    public function abandon(
        string $id,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/abandon');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return CreditMemoAllocation
     */
    public function applyCreditMemo(
        string $id,
        string $creditMemoId,
        CreditMemoAllocation $creditMemoAllocation,
    ): CreditMemoAllocation {
        $pathParams = [
            '{id}' => $id,
            '{creditMemoId}' => $creditMemoId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/credit-memo-allocations/{creditMemoId}');

        $request = new Request('PUT', $uri, body: json_encode($creditMemoAllocation));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemoAllocation::from($data);
    }

    /**
     * @return Invoice
     */
    public function applyTransaction(
        string $id,
        InvoiceTransaction $invoiceTransaction,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/transaction');

        $request = new Request('POST', $uri, body: json_encode($invoiceTransaction));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return Invoice
     */
    public function create(
        Invoice $invoice,
    ): Invoice {
        $uri = '/invoices';

        $request = new Request('POST', $uri, body: json_encode($invoice));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return InvoiceItem
     */
    public function createInvoiceItem(
        string $id,
        InvoiceItem $invoiceItem,
    ): InvoiceItem {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/items');

        $request = new Request('POST', $uri, body: json_encode($invoiceItem));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return InvoiceItem::from($data);
    }

    /**
     * @return InvoiceTimeline
     */
    public function createTimelineComment(
        string $id,
        InvoiceTimeline $invoiceTimeline,
    ): InvoiceTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/timeline');

        $request = new Request('POST', $uri, body: json_encode($invoiceTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return InvoiceTimeline::from($data);
    }

    public function deleteCreditMemoAllocation(
        string $id,
        string $creditMemoId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{creditMemoId}' => $creditMemoId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/credit-memo-allocations/{creditMemoId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteInvoiceItem(
        string $id,
        string $itemId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{itemId}' => $itemId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/items/{itemId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteTimelineMessage(
        string $id,
        string $messageId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Invoice
     */
    public function get(
        string $id,
        ?string $accept = 'application/json',
        ?string $expand = null,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return Invoice[]
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
        $uri = '/invoices' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Invoice => Invoice::from($item), $data);
    }

    /**
     * @return CreditMemoAllocation[]
     */
    public function getAllCreditMemoAllocations(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/credit-memo-allocations') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CreditMemoAllocation => CreditMemoAllocation::from($item), $data);
    }

    /**
     * @return InvoiceItem[]
     */
    public function getAllInvoiceItems(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $expand = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/items') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): InvoiceItem => InvoiceItem::from($item), $data);
    }

    /**
     * @return InvoiceTimeline[]
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): InvoiceTimeline => InvoiceTimeline::from($item), $data);
    }

    /**
     * @return InvoiceTransactionAllocation[]
     */
    public function getAllTransactionAllocations(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/transaction-allocations') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): InvoiceTransactionAllocation => InvoiceTransactionAllocation::from($item), $data);
    }

    /**
     * @return CreditMemoAllocation
     */
    public function getCreditMemoAllocation(
        string $id,
        string $creditMemoId,
        ?int $limit = null,
        ?int $offset = null,
    ): CreditMemoAllocation {
        $pathParams = [
            '{id}' => $id,
            '{creditMemoId}' => $creditMemoId,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/credit-memo-allocations/{creditMemoId}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CreditMemoAllocation::from($data);
    }

    /**
     * @return InvoiceItem
     */
    public function getInvoiceItem(
        string $id,
        string $itemId,
    ): InvoiceItem {
        $pathParams = [
            '{id}' => $id,
            '{itemId}' => $itemId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/items/{itemId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return InvoiceItem::from($data);
    }

    /**
     * @return InvoiceTimeline
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): InvoiceTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return InvoiceTimeline::from($data);
    }

    /**
     * @return Invoice
     */
    public function issue(
        string $id,
        InvoiceIssue $invoiceIssue,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/issue');

        $request = new Request('POST', $uri, body: json_encode($invoiceIssue));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return Invoice
     */
    public function recalculate(
        string $id,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/recalculate');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return Invoice
     */
    public function reissue(
        string $id,
        InvoiceReissue $invoiceReissue,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/reissue');

        $request = new Request('POST', $uri, body: json_encode($invoiceReissue));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return Invoice
     */
    public function update(
        string $id,
        Invoice $invoice,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}');

        $request = new Request('PUT', $uri, body: json_encode($invoice));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return InvoiceItem
     */
    public function updateInvoiceItem(
        string $id,
        string $itemId,
        InvoiceItem $invoiceItem,
    ): InvoiceItem {
        $pathParams = [
            '{id}' => $id,
            '{itemId}' => $itemId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/items/{itemId}');

        $request = new Request('PUT', $uri, body: json_encode($invoiceItem));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return InvoiceItem::from($data);
    }

    /**
     * @return Invoice
     */
    public function void(
        string $id,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/invoices/{id}/void');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
    }
}
