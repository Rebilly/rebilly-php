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
use Psr\Http\Message\StreamInterface;
use Rebilly\Sdk\Collection;
use Rebilly\Sdk\Model\Quote;
use Rebilly\Sdk\Model\QuoteTimeline;
use Rebilly\Sdk\Paginator;

class QuotesApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Quote
     */
    public function accept(
        string $id,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/accept');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    /**
     * @return Quote
     */
    public function cancel(
        string $id,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/cancel');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    /**
     * @return Quote
     */
    public function create(
        Quote $quote,
    ): Quote {
        $uri = '/quotes';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($quote));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    /**
     * @return QuoteTimeline
     */
    public function createTimelineComment(
        string $id,
        QuoteTimeline $quoteTimeline,
    ): QuoteTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/timeline');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($quoteTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return QuoteTimeline::from($data);
    }

    public function deleteTimelineMessage(
        string $id,
        string $messageId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Quote
     */
    public function get(
        string $id,
        ?string $expand = null,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    public function getPdf(
        string $id,
        ?string $expand = null,
    ): StreamInterface {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/pdf',
        ]);
        $response = $this->client->send($request, ['allow_redirects' => ['refer' => true]]);

        return $response->getBody();
    }

    /**
     * @return Collection<Quote>
     */
    public function getAll(
        ?string $filter = null,
        ?array $sort = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $expand = null,
    ): Collection {
        $queryParams = [
            'filter' => $filter,
            'sort' => $sort,
            'limit' => $limit,
            'offset' => $offset,
            'expand' => $expand,
        ];
        $uri = '/quotes?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Quote => Quote::from($item), $data),
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
        ?string $expand = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            filter: $filter,
            sort: $sort,
            limit: $limit,
            offset: $offset,
            expand: $expand,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<QuoteTimeline>
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): QuoteTimeline => QuoteTimeline::from($item), $data),
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
     * @return QuoteTimeline
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): QuoteTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return QuoteTimeline::from($data);
    }

    /**
     * @return Quote
     */
    public function issue(
        string $id,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/issue');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    /**
     * @return Quote
     */
    public function recall(
        string $id,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/recall');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    /**
     * @return Quote
     */
    public function reject(
        string $id,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}/reject');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }

    /**
     * @return Quote
     */
    public function update(
        string $id,
        Quote $quote,
    ): Quote {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/quotes/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($quote));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Quote::from($data);
    }
}
