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

use JsonSerializable;

class SchedulingMethodDayOfWeek implements ServicePeriodAnchorInstruction, InvoiceRetryScheduleInstruction, PeriodAnchor, ScheduleInstruction, ReminderScheduleInstruction, JsonSerializable
{
    public const DAY_SUNDAY = 'Sunday';

    public const DAY_MONDAY = 'Monday';

    public const DAY_TUESDAY = 'Tuesday';

    public const DAY_WEDNESDAY = 'Wednesday';

    public const DAY_THURSDAY = 'Thursday';

    public const DAY_FRIDAY = 'Friday';

    public const DAY_SATURDAY = 'Saturday';

    public const WEEK_NEXT = 'next';

    public const WEEK_FIRST_IN_MONTH = 'first-in-month';

    public const WEEK_LAST_IN_MONTH = 'last-in-month';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('day', $data)) {
            $this->setDay($data['day']);
        }
        if (array_key_exists('week', $data)) {
            $this->setWeek($data['week']);
        }
        if (array_key_exists('time', $data)) {
            $this->setTime($data['time']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'day-of-week';
    }

    public function getDay(): string
    {
        return $this->fields['day'];
    }

    public function setDay(string $day): static
    {
        $this->fields['day'] = $day;

        return $this;
    }

    public function getWeek(): string
    {
        return $this->fields['week'];
    }

    public function setWeek(string $week): static
    {
        $this->fields['week'] = $week;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->fields['time'] ?? null;
    }

    public function setTime(null|string $time): static
    {
        $this->fields['time'] = $time;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'day-of-week',
        ];
        if (array_key_exists('day', $this->fields)) {
            $data['day'] = $this->fields['day'];
        }
        if (array_key_exists('week', $this->fields)) {
            $data['week'] = $this->fields['week'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time'];
        }

        return $data;
    }
}
