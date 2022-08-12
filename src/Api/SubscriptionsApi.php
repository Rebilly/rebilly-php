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
use Rebilly\Sdk\Model\Invoice;
use Rebilly\Sdk\Model\InvoiceIssue;
use Rebilly\Sdk\Model\OrderTimeline;
use Rebilly\Sdk\Model\Subscription;
use Rebilly\Sdk\Model\SubscriptionChange;
use Rebilly\Sdk\Model\SubscriptionInvoice;

class SubscriptionsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
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

        $request = new Request('POST', $uri, body: json_encode($subscriptionChange));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Subscription::from($data);
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
        $uri = '/subscriptions' . '?' . http_build_query($queryParams);

        $request = new Request('POST', $uri, body: json_encode($subscription));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Subscription::from($data);
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

        $request = new Request('POST', $uri, body: json_encode($subscriptionInvoice));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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

        $request = new Request('POST', $uri, body: json_encode($orderTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Subscription::from($data);
    }

    /**
     * @return Subscription[]
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
        $uri = '/subscriptions' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Subscription => Subscription::from($item), $data);
    }

    /**
     * @return OrderTimeline[]
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): OrderTimeline => OrderTimeline::from($item), $data);
    }

    /**
     * @return Invoice[]
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/upcoming-invoices') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Invoice => Invoice::from($item), $data);
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
        $data = json_decode((string) $response->getBody(), true);

        return OrderTimeline::from($data);
    }

    /**
     * @return Invoice
     */
    public function issueUpcomingInvoice(
        string $id,
        string $invoiceId,
        InvoiceIssue $invoiceIssue,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
            '{invoiceId}' => $invoiceId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}/upcoming-invoices/{invoiceId}/issue');

        $request = new Request('POST', $uri, body: json_encode($invoiceIssue));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Invoice::from($data);
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/subscriptions/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('PUT', $uri, body: json_encode($subscription));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Subscription::from($data);
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
        $data = json_decode((string) $response->getBody(), true);

        return Subscription::from($data);
    }
}
