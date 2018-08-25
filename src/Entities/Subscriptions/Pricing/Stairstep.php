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
