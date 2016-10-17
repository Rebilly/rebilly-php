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
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Coupon extends Resource
{
    /**
     * @var Discount|null
     */
    private $discount;

    /**
     * @var Restriction[]
     */
    private $restrictions = [];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        if (isset($data['discount'])) {
            $this->discount = Discount::createFromData($data);
        }

        if (isset($data['restrictions']) && is_array($data['restrictions'])) {
            foreach ($data['restrictions'] as $restriction) {
                $this->restrictions[] = Restriction::createFromData($restriction);
            }
        }

        parent::__construct($data);
    }

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
     * @return Discount|null
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function setDiscount(Discount $discount)
    {
        $this->discount = $discount;

        return $this->setAttribute('discount', $discount->jsonSerialize());
    }

    /**
     * @return array
     */
    public function getRestrictions()
    {
        return $this->restrictions;
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

        $this->restrictions = $restrictions;

        return $this->setAttribute('restrictions', $value);
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
