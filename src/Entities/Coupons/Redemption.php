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
 * Class Redemption.
 */
final class Redemption extends Entity
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
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return array
     */
    public function getAdditionalRestrictions()
    {
        return $this->getAttribute('additionalRestrictions');
    }

    /**
     * @param array $restrictions
     *
     * @throws DomainException
     *
     * @return $this
     */
    public function setAdditionalRestrictions(array $restrictions)
    {
        return $this->setAttribute('additionalRestrictions', $restrictions);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function createAdditionalRestrictions(array $data)
    {
        return array_map(
            function (array $values) {
                return Restriction::createFromData($values);
            },
            $data
        );
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @deprecated Use getCreatedTime() instead
     *
     * @return string
     */
    public function getRedeemedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getCanceledTime()
    {
        return $this->getAttribute('canceledTime');
    }
}
