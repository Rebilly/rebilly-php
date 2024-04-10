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
use Rebilly\Sdk\Model\Customer;
use Rebilly\Sdk\Model\CustomerInformation;
use Rebilly\Sdk\Model\CustomerTimeline;
use Rebilly\Sdk\Model\Edd;
use Rebilly\Sdk\Model\EddSearchResult;
use Rebilly\Sdk\Model\EddTimeline;
use Rebilly\Sdk\Model\LeadSource;
use Rebilly\Sdk\Model\PatchCustomerEddScoreRequest;
use Rebilly\Sdk\Paginator;

class CustomersApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Customer
     */
    public function create(
        Customer $customer,
    ): Customer {
        $uri = '/customers';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($customer));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Customer::from($data);
    }

    /**
     * @return EddTimeline
     */
    public function createEddTimelineComment(
        string $id,
        EddTimeline $eddTimeline,
    ): EddTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-timeline');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($eddTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EddTimeline::from($data);
    }

    /**
     * @return LeadSource
     */
    public function createLeadSource(
        string $id,
        LeadSource $leadSource,
    ): LeadSource {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/lead-source');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($leadSource));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return LeadSource::from($data);
    }

    /**
     * @return CustomerTimeline
     */
    public function createTimelineComment(
        string $id,
        CustomerTimeline $customerTimeline,
    ): CustomerTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/timeline');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($customerTimeline));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CustomerTimeline::from($data);
    }

    public function deleteEddTimelineMessage(
        string $id,
        string $messageId,
    ): void {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function deleteLeadSource(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/lead-source');

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

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/timeline/{messageId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Customer
     */
    public function get(
        string $id,
        ?string $expand = null,
        ?string $fields = null,
    ): Customer {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'expand' => $expand,
            'fields' => $fields,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Customer::from($data);
    }

    /**
     * @return Collection<Customer>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'expand' => $expand,
            'fields' => $fields,
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/customers?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Customer => Customer::from($item), $data),
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
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            expand: $expand,
            fields: $fields,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<EddSearchResult>
     */
    public function getAllEddSearchResults(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
    ): Collection {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-search-results?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): EddSearchResult => EddSearchResult::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getAllEddSearchResultsPaginator(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllEddSearchResults(
            id: $id,
            limit: $limit,
            offset: $offset,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    /**
     * @return Collection<CustomerTimeline>
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CustomerTimeline => CustomerTimeline::from($item), $data),
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
     * @return Edd
     */
    public function getCustomerEddScore(
        string $id,
    ): Edd {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-score');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Edd::from($data);
    }

    /**
     * @return CustomerInformation
     */
    public function getCustomerLifetimeSummaryMetrics(
        string $customerId,
    ): CustomerInformation {
        $pathParams = [
            '{customerId}' => $customerId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/experimental/customers/{customerId}/summary-metrics');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CustomerInformation::from($data);
    }

    /**
     * @return EddSearchResult
     */
    public function getEddSearchResult(
        string $id,
        string $searchResultId,
    ): EddSearchResult {
        $pathParams = [
            '{id}' => $id,
            '{searchResultId}' => $searchResultId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-search-results/{searchResultId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EddSearchResult::from($data);
    }

    /**
     * @return Collection<EddTimeline>
     */
    public function getEddTimelineCollection(
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-timeline?') . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): EddTimeline => EddTimeline::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    public function getEddTimelineCollectionPaginator(
        string $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getEddTimelineCollection(
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
     * @return EddTimeline
     */
    public function getEddTimelineMessage(
        string $id,
        string $messageId,
    ): EddTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return EddTimeline::from($data);
    }

    /**
     * @return LeadSource
     */
    public function getLeadSource(
        string $id,
    ): LeadSource {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/lead-source');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return LeadSource::from($data);
    }

    /**
     * @return CustomerTimeline
     */
    public function getTimelineMessage(
        string $id,
        string $messageId,
    ): CustomerTimeline {
        $pathParams = [
            '{id}' => $id,
            '{messageId}' => $messageId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/timeline/{messageId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CustomerTimeline::from($data);
    }

    public function merge(
        string $id,
        string $targetCustomerId,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $queryParams = [
            'targetCustomerId' => $targetCustomerId,
        ];
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}?') . http_build_query($queryParams);

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Edd
     */
    public function patchCustomerEddScore(
        string $id,
        PatchCustomerEddScoreRequest $patchCustomerEddScoreRequest,
    ): Edd {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-score');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($patchCustomerEddScoreRequest));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Edd::from($data);
    }

    /**
     * @return Customer
     */
    public function update(
        string $id,
        Customer $customer,
    ): Customer {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}');

        $request = new Request('PUT', $uri, body: Utils::jsonEncode($customer));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Customer::from($data);
    }
}
