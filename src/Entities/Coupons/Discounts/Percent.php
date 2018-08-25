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

namespace Rebilly\Entities\Coupons\Discounts;

use Rebilly\Entities\Coupons\Discount;

/**
 * Class Percent.
 */
class Percent extends Discount
{
    /**
     * @return float
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function discountType()
    {
        return self::TYPE_PERCENT;
    }
}
