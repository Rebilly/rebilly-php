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

class PlanFactory
{
    public static function from(array $data = [], array $metadata = []): Plan
    {
        if ($data['isTrialOnly'] ?? false) {
            return TrialOnlyPlan::from($data, $metadata);
        }
        if (isset($data['recurringInterval'])) {
            return SubscriptionPlan::from($data, $metadata);
        }

        return OneTimeSalePlan::from($data, $metadata);
    }
}
