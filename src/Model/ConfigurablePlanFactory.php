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

class ConfigurablePlanFactory
{
    public static function from(array $data = []): ConfigurablePlan
    {
        if (count($data) === 1 && isset($data['id'])) {
            return OriginalPlan::from($data);
        }

        return FlexiblePlanFactory::from($data);
    }
}
