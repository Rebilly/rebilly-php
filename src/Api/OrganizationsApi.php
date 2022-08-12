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
use Rebilly\Sdk\Model\Organization;

class OrganizationsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Organization
     */
    public function create(
        ?Organization $organization = null,
    ): Organization {
        $uri = '/organizations';

        $request = new Request('POST', $uri, body: json_encode($organization));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Organization::from($data);
    }

    /**
     * @return Organization
     */
    public function get(
        string $id,
    ): Organization {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/organizations/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Organization::from($data);
    }

    /**
     * @return Organization[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/organizations' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Organization => Organization::from($item), $data);
    }

    /**
     * @return Organization
     */
    public function update(
        string $id,
        ?Organization $organization = null,
    ): Organization {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/organizations/{id}');

        $request = new Request('PATCH', $uri, body: json_encode($organization));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Organization::from($data);
    }
}
