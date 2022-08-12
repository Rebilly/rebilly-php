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
use Rebilly\Sdk\Model\CustomDomain;

class CustomDomainsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return CustomDomain
     */
    public function create(
        ?CustomDomain $customDomain = null,
    ): CustomDomain {
        $uri = '/custom-domains';

        $request = new Request('POST', $uri, body: json_encode($customDomain));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomDomain::from($data);
    }

    public function delete(
        string $domain,
    ): void {
        $pathParams = [
            '{domain}' => $domain,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-domains/{domain}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return CustomDomain
     */
    public function get(
        string $domain,
    ): CustomDomain {
        $pathParams = [
            '{domain}' => $domain,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/custom-domains/{domain}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CustomDomain::from($data);
    }

    /**
     * @return CustomDomain[]
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?array $sort = null,
        ?string $filter = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'sort' => $sort,
            'filter' => $filter,
            'q' => $q,
        ];
        $uri = '/custom-domains' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CustomDomain => CustomDomain::from($item), $data);
    }
}
