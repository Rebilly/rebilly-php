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

class Fixed extends Discount
{
    /**
     * {@inheritdoc}
     */
    public function getDiscountType()
    {
        return self::TYPE_FIXED;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }
}
