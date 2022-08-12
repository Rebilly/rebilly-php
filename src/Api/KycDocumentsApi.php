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
use Rebilly\Sdk\Model\AddressMatches;
use Rebilly\Sdk\Model\IdentityMatches;
use Rebilly\Sdk\Model\KycDocument;
use Rebilly\Sdk\Model\KycDocumentRejection;

class KycDocumentsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return KycDocument
     */
    public function accept(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/acceptance');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument
     */
    public function create(
        KycDocument $kycDocument,
    ): KycDocument {
        $uri = '/kyc-documents';

        $request = new Request('POST', $uri, body: json_encode($kycDocument));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument
     */
    public function get(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
        ];
        $uri = '/kyc-documents' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): KycDocument => KycDocument::from($item), $data);
    }

    public function matches(
        string $id,
        IdentityMatches|AddressMatches $body,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/matches');

        $request = new Request('POST', $uri, body: json_encode($body));
        $this->client->send($request);
    }

    /**
     * @return KycDocument
     */
    public function reject(
        string $id,
        KycDocumentRejection $kycDocumentRejection,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/rejection');

        $request = new Request('POST', $uri, body: json_encode($kycDocumentRejection));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument
     */
    public function review(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/review');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument
     */
    public function startReview(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/start-review');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument
     */
    public function stopReview(
        string $id,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}/stop-review');

        $request = new Request('POST', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }

    /**
     * @return KycDocument
     */
    public function update(
        string $id,
        KycDocument $kycDocument,
    ): KycDocument {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/kyc-documents/{id}');

        $request = new Request('PUT', $uri, body: json_encode($kycDocument));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return KycDocument::from($data);
    }
}
