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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class PeriodAnchorFactory
{
    public static function from(array $data = []): PeriodAnchor
    {
        return match ($data['method']) {
            'day-of-month' => SchedulingMethodDayOfMonth::from($data),
            'day-of-week' => SchedulingMethodDayOfWeek::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
