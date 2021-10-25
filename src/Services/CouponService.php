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

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Coupons\Coupon;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CouponService
 *
 */
final class CouponService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Coupon[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'coupons', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Coupon[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('coupons', $params);
    }

    /**
     * @param string $couponId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return Coupon
     */
    public function load($couponId, $params = [])
    {
        return $this->client()->get('coupons/{couponId}', ['couponId' => $couponId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Coupon $data
     * @param string $couponId
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Coupon
     */
    public function create($data, $couponId = null)
    {
        if (isset($couponId)) {
            return $this->client()->put($data, 'coupons/{couponId}', ['couponId' => $couponId]);
        }

        return $this->client()->post($data, 'coupons');
    }

    /**
     * @param string $couponId
     * @param array|JsonSerializable|Coupon $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Coupon
     */
    public function update($couponId, $data)
    {
        return $this->client()->put($data, 'coupons/{couponId}', ['couponId' => $couponId]);
    }

    /**
     * @param $couponId
     * @param null|string $expiredTime Null or empty string will immediately expire the coupon.
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Coupon
     */
    public function expiration($couponId, $expiredTime = null)
    {
        return $this->client()->post(
            ['expiredTime' => $expiredTime],
            'coupons/{couponId}/expiration',
            ['couponId' => $couponId]
        );
    }
}
