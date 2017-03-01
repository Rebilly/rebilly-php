<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Coupons;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class Coupon
 *
 * ```json
 * {
 *   "redemptionCode"
 *   "description"
 *   "discount"
 *   "restrictions"
 *   "redemptionsCount"
 *   "status"
 *   "issuedTime"
 *   "expiredTime"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class Coupon extends Resource
{
    /**
     * @return string
     */
    public function getRedemptionCode()
    {
        return $this->getAttribute('redemptionCode');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRedemptionCode($value)
    {
        return $this->setAttribute('redemptionCode', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return Discount|null
     */
    public function getDiscount()
    {
        return $this->getAttribute('discount');
    }

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function setDiscount(Discount $discount)
    {
        return $this->setAttribute('discount', $discount->jsonSerialize());
    }

    /**
     * @param array $data
     *
     * @return Discount
     */
    public function createDiscount(array $data)
    {
        return Discount::createFromData($data);
    }

    /**
     * @return array
     */
    public function getRestrictions()
    {
        return $this->getAttribute('restrictions');
    }

    /**
     * @param array $restrictions
     *
     * @throws DomainException
     *
     * @return $this
     */
    public function setRestrictions(array $restrictions)
    {
        $value = [];

        foreach ($restrictions as $restriction) {
            if (!$restriction instanceof Restriction) {
                throw new DomainException('Wrong restrictions object');
            }

            $value[] = $restriction->jsonSerialize();
        }

        return $this->setAttribute('restrictions', $value);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function createRestrictions(array $data)
    {
        return array_map(
            function (array $values) {
                return Restriction::createFromData($values);
            },
            $data
        );
    }

    /**
     * @return int
     */
    public function getRedemptionsCount()
    {
        return $this->getAttribute('redemptionsCount');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string
     */
    public function getIssuedTime()
    {
        return $this->getAttribute('issuedTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setIssuedTime($value)
    {
        return $this->setAttribute('issuedTime', $value);
    }

    /**
     * @return string
     */
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpiredTime($value)
    {
        return $this->setAttribute('expiredTime', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getUpdatedTime()
    {
        return $this->getAttribute('updatedTime');
    }
}
