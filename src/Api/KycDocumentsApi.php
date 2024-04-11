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
use Rebilly\Sdk\Model\KycDocument;
use Rebilly\Sdk\Model\KycDocumentFactory;
use Rebilly\Sdk\Model\KycDocumentRejection;
use Rebilly\Sdk\Model\PostKycDocumentMatchesRequest;
use Rebilly\Sdk\Paginator;

class KycDocumentsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function accept(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/acceptance');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    public function create(
        KycDocument $kycDocument,
    ): KycDocument {
        $uri = '/kyc-documents';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($kycDocument));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    public function get(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    /**
     * @return Collection<KycDocument>
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $expand = null,
    ): Collection {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort ? implode(',', $sort) : null,
            'expand' => $expand,
        ];
        $uri = '/kyc-documents?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): KycDocument => KycDocumentFactory::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<KycDocument>
     */
    public function getAllPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $expand = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAll(
            limit: $limit,
            offset: $offset,
            filter: $filter,
            sort: $sort,
            expand: $expand,
        );

        return new Paginator(
            $limit !== null || $offset !== null ? $closure(limit: $limit, offset: $offset) : null,
            $closure,
        );
    }

    public function matches(
        string $id,
        PostKycDocumentMatchesRequest $postKycDocumentMatchesRequest,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/matches');

        $request = new Request('POST', $uri, body: Utils::jsonEncode($postKycDocumentMatchesRequest));
        $this->client->send($request);
    }

    public function reject(
        string $id,
        KycDocumentRejection $kycDocumentRejection,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/rejection');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($kycDocumentRejection));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    public function review(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/review');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    public function startReview(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/start-review');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    public function stopReview(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/stop-review');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }

    public function update(
        string $id,
        KycDocument $kycDocument,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($kycDocument));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return KycDocumentFactory::from($data);
    }
}
