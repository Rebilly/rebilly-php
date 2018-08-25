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

namespace Rebilly\Entities\Coupons\Restrictions;

use Rebilly\Entities\Coupons\Restriction;

/**
 * Class RedemptionsPerCustomer.
 */
class RedemptionsPerCustomer extends Restriction
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getAttribute('quantity');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', $value);
    }

    /**
     * @return string
     */
    protected function restrictionType()
    {
        return self::TYPE_REDEMPTIONS_PER_CUSTOMER;
    }
}
