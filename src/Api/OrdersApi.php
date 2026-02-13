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
use Rebilly\Sdk\Model\Order;
use Rebilly\Sdk\Model\OrderChange;
use Rebilly\Sdk\Model\OrderFactory;
use Rebilly\Sdk\Model\OrderItemUpdate;
use Rebilly\Sdk\Model\OrderUpcomingInvoice;
use Rebilly\Sdk\Model\SubscriptionInvoice;
use Rebilly\Sdk\Model\SubscriptionOrOneTimeSaleItem;
use Rebilly\Sdk\Model\UpcomingInvoice;
use Rebilly\Sdk\Paginator;

class OrdersApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function changeItems(
        string $id,
        OrderChange $orderChange,
        ?string $expand = null,
    ): Order {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}/change-items?') . http_build_query($queryParams);

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($orderChange));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderFactory::from($data);
    }

    public function create(
        Order $order,
        ?string $expand = null,
    ): Order {
        $queryParams = [
            'expand' => $expand,
        ];
        $uri = '/orders?' . http_build_query($queryParams);

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($order));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderFactory::from($data);
    }

    public function createInterimInvoice(
        string $id,
        SubscriptionInvoice $subscriptionInvoice,
    ): Invoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}/interim-invoice');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($subscriptionInvoice));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Invoice::from($data);
    }

    public function get(
        string $id,
        ?string $expand = null,
    ): Order {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderFactory::from($data);
    }

    /**
     * @return Collection<Order>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
            'limit' => $limit,
            'offset' => $offset,
            'q' => $q,
        ];
        $uri = '/orders?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Order => OrderFactory::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<Order>
     */
    public function getAllPaginator(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            q: $q,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    public function getUpcomingInvoice(
        string $id,
        ?string $expand = null,
    ): OrderUpcomingInvoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}/upcoming-invoice?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderUpcomingInvoice::from($data);
    }

    public function issueEarlyUpcomingInvoice(
        string $id,
        InvoiceIssue $invoiceIssue,
    ): UpcomingInvoice {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}/upcoming-invoice/issue');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($invoiceIssue));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return UpcomingInvoice::from($data);
    }

    public function update(
        string $id,
        Order $order,
        ?string $expand = null,
    ): Order {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}?') . http_build_query($queryParams);

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($order));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderFactory::from($data);
    }

    public function updateItem(
        string $id,
        string $itemId,
        OrderItemUpdate $orderItemUpdate,
    ): SubscriptionOrOneTimeSaleItem {
        $pathParams = [
            '{id}' => $id,
            '{itemId}' => $itemId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}/items/{itemId}');

        $request = new Request('PATCH', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($orderItemUpdate));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return SubscriptionOrOneTimeSaleItem::from($data);
    }

    public function void(
        string $id,
    ): Order {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/orders/{id}/void');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return OrderFactory::from($data);
    }
}
