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

class InvoiceRetryScheduleInstructionFactory
{
    public static function from(array $data = []): InvoiceRetryScheduleInstruction
    {
        return match ($data['method']) {
            'date-interval' => SchedulingMethodDateInterval::from($data),
            'day-of-month' => SchedulingMethodDayOfMonth::from($data),
            'day-of-week' => SchedulingMethodDayOfWeek::from($data),
            'immediately' => SchedulingMethodImmediately::from($data),
            'intelligent' => SchedulingMethodIntelligent::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
