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
use Rebilly\Sdk\Model\Membership;

class MembershipsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    public function delete(
        string $organizationId,
        string $userId,
    ): void {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return Membership
     *
     */
    public function get(
        string $organizationId,
        string $userId,
    ): Membership {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Membership::from($data);
    }

    /**
     * @return Membership[]
     *
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
        $uri = '/memberships' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Membership => Membership::from($item), $data);
    }

    /**
     * @return Membership
     *
     */
    public function update(
        string $organizationId,
        string $userId,
        Membership $membership,
    ): Membership {
        $pathParams = [
            '{organizationId}' => $organizationId,
            '{userId}' => $userId,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/memberships/{organizationId}/{userId}');

        $request = new Request('PUT', $uri, body: json_encode($membership));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Membership::from($data);
    }
}
