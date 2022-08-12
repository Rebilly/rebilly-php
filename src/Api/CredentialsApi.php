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
use Rebilly\Sdk\Model\CustomerCredential;

class CredentialsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomerCredential
     *
     */
    public function createCredential(
        CustomerCredential $customerCredential,
    ): CustomerCredential {
        $uri = '/credentials';

        $request = new Request('POST', $uri, body: json_encode($customerCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerCredential::from($data);
    }

    public function deleteCredential(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credentials/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return CustomerCredential[]
     *
     */
    public function getAllCredentials(
        ?int $limit = null,
        ?int $offset = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
        ];
        $uri = '/credentials' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CustomerCredential => CustomerCredential::from($item), $data);
    }

    /**
     * @return CustomerCredential
     *
     */
    public function getCredential(
        string $id,
    ): CustomerCredential {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credentials/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerCredential::from($data);
    }

    /**
     * @return CustomerCredential
     *
     */
    public function updateCredential(
        string $id,
        CustomerCredential $customerCredential,
    ): CustomerCredential {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/credentials/{id}');

        $request = new Request('PUT', $uri, body: json_encode($customerCredential));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomerCredential::from($data);
    }
}
