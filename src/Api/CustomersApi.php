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
use Rebilly\Sdk\Model\AML;
use Rebilly\Sdk\Model\Customer;
use Rebilly\Sdk\Model\CustomerTimeline;
use Rebilly\Sdk\Model\Edd;
use Rebilly\Sdk\Model\EddSearchResult;
use Rebilly\Sdk\Model\EddTimeline;
use Rebilly\Sdk\Model\Invoice;
use Rebilly\Sdk\Model\LeadSource;
use Rebilly\Sdk\Model\PatchCustomerEddScoreRequest;

class CustomersApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Customer
     *
     */
    public function create(
        Customer $customer,
    ): Customer {
        $uri = '/customers';

        $request = new Request('POST', $uri, body: json_encode($customer));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Customer::from($data);
    }

    /**
     * @return EddTimeline
     *
     */
    public function createEddTimelineComment(
        string $id,
        EddTimeline $eddTimeline,
    ): EddTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-timeline');

        $request = new Request('POST', $uri, body: json_encode($eddTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return EddTimeline::from($data);
    }

    /**
     * @return LeadSource
     *
     */
    public function createLeadSource(
        string $id,
        LeadSource $leadSource,
    ): LeadSource {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/lead-source');

        $request = new Request('PUT', $uri, body: json_encode($leadSource));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return LeadSource::from($data);
    }

    /**
     * @return CustomerTimeline
     *
     */
    public function createTimelineComment(
        string $id,
        CustomerTimeline $customerTimeline,
    ): CustomerTimeline {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/timeline');

        $request = new Request('POST', $uri, body: json_encode($customerTimeline));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerTimeline::from($data);
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
     *
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Customer::from($data);
    }

    /**
     * @return Customer[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?string $expand = null,
        ?string $fields = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'expand' => $expand,
            'fields' => $fields,
            'sort' => $sort,
        ];
        $uri = '/customers' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Customer => Customer::from($item), $data);
    }

    /**
     * @return EddSearchResult[]
     *
     */
    public function getAllEddSearchResults(
        string $id,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-search-results');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): EddSearchResult => EddSearchResult::from($item), $data);
    }

    /**
     * @return CustomerTimeline[]
     *
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CustomerTimeline => CustomerTimeline::from($item), $data);
    }

    /**
     * @return Invoice[]
     *
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/upcoming-invoices') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Invoice => Invoice::from($item), $data);
    }

    /**
     * @return AML[]
     *
     */
    public function getAml(
        string $id,
    ): array {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/aml');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): AML => AML::from($item), $data);
    }

    /**
     * @return Edd
     *
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
        $data = json_decode((string) $response->getBody(), true);

        return Edd::from($data);
    }

    /**
     * @return EddTimeline[]
     *
     */
    public function getEddTimelineCollection(
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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-timeline') . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): EddTimeline => EddTimeline::from($item), $data);
    }

    /**
     * @return LeadSource
     *
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
        $data = json_decode((string) $response->getBody(), true);

        return LeadSource::from($data);
    }

    /**
     * @return CustomerTimeline
     *
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
        $data = json_decode((string) $response->getBody(), true);

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
        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}') . '?' . http_build_query($queryParams);

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Edd
     *
     */
    public function patchCustomerEddScore(
        string $id,
        ?PatchCustomerEddScoreRequest $patchCustomerEddScoreRequest = null,
    ): Edd {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}/edd-score');

        $request = new Request('PATCH', $uri, body: json_encode($patchCustomerEddScoreRequest));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Edd::from($data);
    }

    /**
     * @return Customer
     *
     */
    public function update(
        string $id,
        Customer $customer,
    ): Customer {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/customers/{id}');

        $request = new Request('PUT', $uri, body: json_encode($customer));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Customer::from($data);
    }
}
