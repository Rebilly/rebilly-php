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

namespace Rebilly\Entities\Coupons;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Coupon.
 */
final class Coupon extends Entity
{
    /**
     * @deprecated use {@see getId()} instead
     *
     * @return string
     */
    public function getRedemptionCode()
    {
        return $this->getId();
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
    public function setDiscount($discount)
    {
        return $this->setAttribute('discount', $discount);
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
        return $this->setAttribute('restrictions', $restrictions);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function createRestrictions(array $data)
    {
        return array_map(
            function ($restriction) {
                if ($restriction instanceof Restriction) {
                    return $restriction;
                }

                if (!is_array($restriction)) {
                    throw new DomainException('Incorrect restriction - it must be an array or instance of Restriction.');
                }

                return Restriction::createFromData($restriction);
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
