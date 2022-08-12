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
use Rebilly\Sdk\Model\ShippingRate;

class ShippingRatesApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return ShippingRate
     *
     */
    public function create(
        ShippingRate $shippingRate,
    ): ShippingRate {
        $uri = '/shipping-rates';

        $request = new Request('POST', $uri, body: json_encode($shippingRate));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ShippingRate::from($data);
    }

    public function delete(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/shipping-rates/{id}');

        $request = new Request('DELETE', $uri);
        $this->client->send($request);
    }

    /**
     * @return ShippingRate
     *
     */
    public function get(
        string $id,
    ): ShippingRate {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/shipping-rates/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ShippingRate::from($data);
    }

    /**
     * @return ShippingRate[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?array $sort = null,
        ?string $q = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'sort' => $sort,
            'q' => $q,
        ];
        $uri = '/shipping-rates' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): ShippingRate => ShippingRate::from($item), $data);
    }

    /**
     * @return ShippingRate
     *
     */
    public function update(
        string $id,
        ShippingRate $shippingRate,
    ): ShippingRate {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/shipping-rates/{id}');

        $request = new Request('PUT', $uri, body: json_encode($shippingRate));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return ShippingRate::from($data);
    }
}
