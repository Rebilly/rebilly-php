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

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

class FlexiblePlanFactory
{
    public static function from(array $data = []): FlexiblePlan
    {
        if ($data['isTrialOnly'] ?? false) {
            return TrialOnlyPlan::from($data);
        }
        if (isset($data['recurringInterval'])) {
            return SubscriptionPlan::from($data);
        }

        return OneTimeSalePlan::from($data);
    }
}
