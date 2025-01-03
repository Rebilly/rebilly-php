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

class SchedulingMethodDayOfMonth implements ServicePeriodAnchorInstruction, InvoiceRetryScheduleInstruction, PeriodAnchor, ScheduleInstruction, ReminderScheduleInstruction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('day', $data)) {
            $this->setDay($data['day']);
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
        return 'day-of-month';
    }

    public function getDay(): int
    {
        return $this->fields['day'];
    }

    public function setDay(int $day): static
    {
        $this->fields['day'] = $day;

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
            'method' => 'day-of-month',
        ];
        if (array_key_exists('day', $this->fields)) {
            $data['day'] = $this->fields['day'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time'];
        }

        return $data;
    }
}
