<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2016 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Coupons\Discounts;

use Rebilly\Entities\Coupons\Discount;

class Percent extends Discount
{
    /**
     * {@inheritdoc}
     */
    public function getDiscountType()
    {
        return self::TYPE_PERCENT;
    }

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
}
