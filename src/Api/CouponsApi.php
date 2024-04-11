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
use Rebilly\Sdk\Model\Coupon;
use Rebilly\Sdk\Model\CouponExpiration;
use Rebilly\Sdk\Model\CouponRedemption;
use Rebilly\Sdk\Paginator;

class CouponsApi
{
    public function __construct(protected ?ClientInterface $client)
    {
    }

    public function cancelRedemption(
        string $id,
    ): void {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons-redemptions/{id}/cancel');

        $request = new Request('POST', $uri);
        $this->client->send($request);
    }

    public function create(
        Coupon $coupon,
    ): Coupon {
        $uri = '/coupons';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($coupon));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Coupon::from($data);
    }

    public function get(
        string $id,
    ): Coupon {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Coupon::from($data);
    }

    /**
     * @return Collection<Coupon>
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
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/coupons?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): Coupon => Coupon::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<Coupon>
     */
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

    /**
     * @return Collection<CouponRedemption>
     */
    public function getAllRedemptions(
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
            'sort' => $sort ? implode(',', $sort) : null,
        ];
        $uri = '/coupons-redemptions?' . http_build_query($queryParams);

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return new Collection(
            array_map(fn (array $item): CouponRedemption => CouponRedemption::from($item), $data),
            (int) $response->getHeaderLine(Collection::HEADER_LIMIT),
            (int) $response->getHeaderLine(Collection::HEADER_OFFSET),
            (int) $response->getHeaderLine(Collection::HEADER_TOTAL),
        );
    }

    /**
     * @return Paginator<CouponRedemption>
     */
    public function getAllRedemptionsPaginator(
        ?int $limit = null,
        ?int $offset = null,
        ?string $filter = null,
        ?string $q = null,
        ?array $sort = null,
    ): Paginator {
        $closure = fn (?int $limit, ?int $offset): Collection => $this->getAllRedemptions(
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

    public function getRedemption(
        string $id,
    ): CouponRedemption {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons-redemptions/{id}');

        $request = new Request('GET', $uri, headers: [
            'Accept' => 'application/json',
        ]);
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CouponRedemption::from($data);
    }

    public function redeem(
        CouponRedemption $couponRedemption,
    ): CouponRedemption {
        $uri = '/coupons-redemptions';

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($couponRedemption));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return CouponRedemption::from($data);
    }

    public function setExpiration(
        string $id,
        CouponExpiration $couponExpiration,
    ): Coupon {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons/{id}/expiration');

        $request = new Request('POST', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($couponExpiration));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Coupon::from($data);
    }

    public function update(
        string $id,
        Coupon $coupon,
    ): Coupon {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons/{id}');

        $request = new Request('PUT', $uri, headers: [
            'Accept' => 'application/json',
        ], body: Utils::jsonEncode($coupon));
        $response = $this->client->send($request);
        $data = Utils::jsonDecode((string) $response->getBody(), true);

        return Coupon::from($data);
    }
}
