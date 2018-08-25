<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\Subscriptions\Pricing;

use Rebilly\Entities\Subscriptions\PlanPricing;

final class FlatRate extends PlanPricing
{
    protected function formula()
    {
        return self::FLAT_RATE;
    }

    public function getPrice()
    {
        return $this->getAttribute('price');
    }

    public function setPrice($value)
    {
        return $this->setAttribute('price', $value);
    }

    public function getMaxQuantity()
    {
        return $this->getAttribute('maxQuantity');
    }

    public function setMaxQuantity($value)
    {
        return $this->setAttribute('maxQuantity', $value);
    }
}
