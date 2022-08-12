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
use Rebilly\Sdk\Model\Coupon;
use Rebilly\Sdk\Model\CouponExpiration;

class CouponsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return Coupon
     *
     */
    public function create(
        Coupon $coupon,
    ): Coupon {
        $uri = '/coupons';

        $request = new Request('POST', $uri, body: json_encode($coupon));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Coupon::from($data);
    }

    /**
     * @return Coupon
     *
     */
    public function get(
        string $id,
    ): Coupon {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Coupon::from($data);
    }

    /**
     * @return Coupon[]
     *
     */
    public function getAll(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
    ): array {
        $queryParams = [
            'limit' => $limit,
            'offset' => $offset,
            'filter' => $filter,
            'q' => $q,
            'sort' => $sort,
        ];
        $uri = '/coupons' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): Coupon => Coupon::from($item), $data);
    }

    /**
     * @return Coupon
     *
     */
    public function setExpiration(
        string $id,
        ?CouponExpiration $couponExpiration = null,
    ): Coupon {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons/{id}/expiration');

        $request = new Request('POST', $uri, body: json_encode($couponExpiration));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Coupon::from($data);
    }

    /**
     * @return Coupon
     *
     */
    public function update(
        string $id,
        Coupon $coupon,
    ): Coupon {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons/{id}');

        $request = new Request('PUT', $uri, body: json_encode($coupon));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return Coupon::from($data);
    }
}
