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

final class Stairstep extends PlanPricing
{
    use BracketsTrait;

    protected function formula()
    {
        return self::STAIRSTEP;
    }
}
