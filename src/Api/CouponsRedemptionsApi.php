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
use Rebilly\Sdk\Model\CouponRedemption;

class CouponsRedemptionsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
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

    /**
     * @return CouponRedemption[]
     *
     */
    public function getAllRedemptions(
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
        $uri = '/coupons-redemptions' . '?' . http_build_query($queryParams);

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): CouponRedemption => CouponRedemption::from($item), $data);
    }

    /**
     * @return CouponRedemption
     *
     */
    public function getRedemption(
        string $id,
    ): CouponRedemption {
        $pathParams = [
            '{id}' => $id,
        ];

        $uri = str_replace(array_keys($pathParams), array_values($pathParams), '/coupons-redemptions/{id}');

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CouponRedemption::from($data);
    }

    /**
     * @return CouponRedemption
     *
     */
    public function redeem(
        CouponRedemption $couponRedemption,
    ): CouponRedemption {
        $uri = '/coupons-redemptions';

        $request = new Request('POST', $uri, body: json_encode($couponRedemption));
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return CouponRedemption::from($data);
    }
}
