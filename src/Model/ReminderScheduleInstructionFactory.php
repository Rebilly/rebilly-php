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

class ReminderScheduleInstructionFactory
{
    public static function from(array $data = [], array $metadata = []): ReminderScheduleInstruction
    {
        return match ($data['method']) {
            'date-interval' => SchedulingMethodDateInterval::from($data, $metadata),
            'day-of-month' => SchedulingMethodDayOfMonth::from($data, $metadata),
            'day-of-week' => SchedulingMethodDayOfWeek::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
