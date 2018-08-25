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

final class FixedFee extends PlanPricing
{
    protected function formula()
    {
        return self::FIXED_FEE;
    }

    public function getPrice()
    {
        return $this->getAttribute('price');
    }

    public function setPrice($value)
    {
        return $this->setAttribute('price', $value);
    }
}