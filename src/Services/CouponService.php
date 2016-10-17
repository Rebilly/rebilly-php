<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Coupons\Coupon;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CouponService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
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
     * @param string $redemptionCode
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Coupon
     */
    public function load($redemptionCode, $params = [])
    {
        return $this->client()->get('coupons/{redemptionCode}', ['redemptionCode' => $redemptionCode] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Coupon $data
     * @param string $redemptionCode
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Coupon
     */
    public function create($data, $redemptionCode = null)
    {
        if (isset($redemptionCode)) {
            return $this->client()->put($data, 'coupons/{redemptionCode}', ['redemptionCode' => $redemptionCode]);
        } else {
            return $this->client()->post($data, 'coupons');
        }
    }

    /**
     * @param string $redemptionCode
     * @param array|JsonSerializable|Coupon $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Coupon
     */
    public function update($redemptionCode, $data)
    {
        return $this->client()->put($data, 'coupons/{redemptionCode}', ['redemptionCode' => $redemptionCode]);
    }
}
