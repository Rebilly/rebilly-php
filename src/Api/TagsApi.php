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
use Rebilly\Sdk\Model\DeleteTagCustomerCollectionRequest;
use Rebilly\Sdk\Model\DeleteTagKycDocumentCollectionRequest;
use Rebilly\Sdk\Model\PostTagCustomerCollectionRequest;
use Rebilly\Sdk\Model\PostTagKycDocumentCollectionRequest;
use Rebilly\Sdk\Model\Tag;
use Rebilly\Sdk\Paginator;

class TagsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    /**
     * @return Tag
     */
    public function create(
        Tag $tag,
    ): Tag {
        $uri = '/tags';

        $request = new Request('POST', $uri, body: Utils::jsonEncode($tag));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Tag::from($data);
    }

    public function delete(
        string $tag,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Tag
     */
    public function get(
        string $tag,
    ): Tag {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Tag::from($data);
    }

    /**
     * @return Collection<Tag>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort,
        ];
        $uri = '/tags?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Tag => Tag::from($item), $data),
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
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            q: $q,
            sort: $sort,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    public function tagCustomer(
        string $tag,
        string $customerId,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
            '{customerId}' => $customerId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/customers/{customerId}');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    public function tagCustomers(
        string $tag,
        PostTagCustomerCollectionRequest $postTagCustomerCollectionRequest,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/customers');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postTagCustomerCollectionRequest));
        $this->client->send($request);
    }

    public function tagKycDocument(
        string $tag,
        string $kycDocumentId,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
            '{kycDocumentId}' => $kycDocumentId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/kyc-documents/{kycDocumentId}');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    public function tagKycDocuments(
        string $tag,
        PostTagKycDocumentCollectionRequest $postTagKycDocumentCollectionRequest,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/kyc-documents');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postTagKycDocumentCollectionRequest));
        $this->client->send($request);
    }

    public function untagCustomer(
        string $tag,
        string $customerId,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
            '{customerId}' => $customerId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/customers/{customerId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function untagCustomers(
        string $tag,
        DeleteTagCustomerCollectionRequest $deleteTagCustomerCollectionRequest,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/customers');

        $request = new Request('DELETE', $uri, body: Utils::jsonEncode($deleteTagCustomerCollectionRequest));
        $this->client->send($request);
    }

    public function untagKycDocument(
        string $tag,
        string $kycDocumentId,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
            '{kycDocumentId}' => $kycDocumentId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/kyc-documents/{kycDocumentId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    public function untagKycDocuments(
        string $tag,
        DeleteTagKycDocumentCollectionRequest $deleteTagKycDocumentCollectionRequest,
    ): void {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}/kyc-documents');

        $request = new Request('DELETE', $uri, body: Utils::jsonEncode($deleteTagKycDocumentCollectionRequest));
        $this->client->send($request);
    }

    /**
     * @return Tag
     */
    public function update(
        string $tag,
        Tag $tag2,
    ): Tag {
        $pathParams = [
            '{tag}' => $tag,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/tags/{tag}');

        $request = new Request('PATCH', $uri, body: Utils::jsonEncode($tag2));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Tag::from($data);
    }
}
