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
use Rebilly\Sdk\Model\Invoice;
use Rebilly\Sdk\Model\InvoiceIssue;
use Rebilly\Sdk\Model\OrderTimeline;
use Rebilly\Sdk\Model\Subscription;
use Rebilly\Sdk\Model\SubscriptionChange;
use Rebilly\Sdk\Model\SubscriptionFactory;
use Rebilly\Sdk\Model\SubscriptionInvoice;
use Rebilly\Sdk\Model\SubscriptionSummaryMetrics;
use Rebilly\Sdk\Model\UpcomingInvoice;
use Rebilly\Sdk\Paginator;

class SubscriptionsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Subscription
     */
    public function changeItems(
        string $id,
        SubscriptionChange $subscriptionChange,
    ): Subscription {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/change-items');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($subscriptionChange));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionFactory::from($data);
    }

    /**
     * @return Subscription
     */
    public function create(
        Subscription $subscription,
        ?string $expand = null,
    ): Subscription {
        $queryParams = [
            'expand' => $expand,
        ];
        $uri = '/subscriptions?' . http_build_query($queryParams);

        $request = new Request('POST', $uri, body: Utils::jsonEncode($subscription));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionFactory::from($data);
    }

    /**
     * @return Invoice
     */
    public function createInterimInvoice(
        string $id,
        SubscriptionInvoice $subscriptionInvoice,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/interim-invoice');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($subscriptionInvoice));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    /**
     * @return OrderTimeline
     */
    public function createTimelineComment(
        string $id,
        OrderTimeline $orderTimeline,
    ): OrderTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/timeline');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($orderTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderTimeline::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}');

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

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Subscription
     */
    public function get(
        string $id,
        ?string $expand = null,
    ): Subscription {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionFactory::from($data);
    }

    /**
     * @return Collection<Subscription>
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
        $uri = '/subscriptions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Subscription => SubscriptionFactory::from($item), $data),
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
     * @return Collection<OrderTimeline>
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): OrderTimeline => OrderTimeline::from($item), $data),
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
     * @return UpcomingInvoice[]
     */
    public function getAllUpcomingInvoices(
        string $id,
        ?string $expand = null,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/upcoming-invoices?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return array_map(fn (array $item): UpcomingInvoice => UpcomingInvoice::from($item), $data);
    }

    /**
     * @return SubscriptionSummaryMetrics
     */
    public function getSubscriptionSummaryMetrics(
        string $subscriptionId,
    ): SubscriptionSummaryMetrics {
        $pathParams = [
            '{subscriptionId}' => $subscriptionId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/subscriptions/{subscriptionId}/summary-metrics');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionSummaryMetrics::from($data);
    }

    /**
     * @return OrderTimeline
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): OrderTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderTimeline::from($data);
    }

    /**
     * @return UpcomingInvoice
     */
    public function getUpcomingInvoice(
        string $id,
        ?string $expand = null,
    ): UpcomingInvoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/upcoming-invoice?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return UpcomingInvoice::from($data);
    }

    /**
     * @return UpcomingInvoice
     */
    public function issueEarlyUpcomingInvoice(
        string $id,
        InvoiceIssue $invoiceIssue,
    ): UpcomingInvoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/upcoming-invoice/issue');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($invoiceIssue));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return UpcomingInvoice::from($data);
    }

    /**
     * @return UpcomingInvoice
     */
    public function issueUpcomingInvoice(
        string $id,
        string $invoiceId,
        InvoiceIssue $invoiceIssue,
    ): UpcomingInvoice {
        $pathParams = [
            '{id}' => $id,
            '{invoiceId}' => $invoiceId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/upcoming-invoices/{invoiceId}/issue');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($invoiceIssue));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return UpcomingInvoice::from($data);
    }

    /**
     * @return Subscription
     */
    public function update(
        string $id,
        Subscription $subscription,
        ?string $expand = null,
    ): Subscription {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}?') . http_build_query($queryParams);

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($subscription));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionFactory::from($data);
    }

    /**
     * @return Subscription
     */
    public function void(
        string $id,
    ): Subscription {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/void');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionFactory::from($data);
    }
}
