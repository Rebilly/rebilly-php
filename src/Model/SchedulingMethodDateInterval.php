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

class SchedulingMethodDateInterval implements InvoiceRetryScheduleInstruction, SettlementPeriod, ScheduleInstruction, ReminderScheduleInstruction
{
    public const UNIT_SECOND = 'second';

    public const UNIT_MINUTE = 'minute';

    public const UNIT_HOUR = 'hour';

    public const UNIT_DAY = 'day';

    public const UNIT_MONTH = 'month';

    public const UNIT_YEAR = 'year';

    public const UNIT_SECONDS = 'seconds';

    public const UNIT_MINUTES = 'minutes';

    public const UNIT_HOURS = 'hours';

    public const UNIT_DAYS = 'days';

    public const UNIT_MONTHS = 'months';

    public const UNIT_YEARS = 'years';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('duration', $data)) {
            $this->setDuration($data['duration']);
        }
        if (array_key_exists('unit', $data)) {
            $this->setUnit($data['unit']);
        }
        if (array_key_exists('anchor', $data)) {
            $this->setAnchor($data['anchor']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'date-interval';
    }

    public function getDuration(): int
    {
        return $this->fields['duration'];
    }

    public function setDuration(int $duration): static
    {
        $this->fields['duration'] = $duration;

        return $this;
    }

    public function getUnit(): string
    {
        return $this->fields['unit'];
    }

    public function setUnit(string $unit): static
    {
        $this->fields['unit'] = $unit;

        return $this;
    }

    public function getAnchor(): ?PeriodAnchor
    {
        return $this->fields['anchor'] ?? null;
    }

    public function setAnchor(null|PeriodAnchor|array $anchor): static
    {
        if ($anchor !== null && !($anchor instanceof PeriodAnchor)) {
            $anchor = PeriodAnchorFactory::from($anchor);
        }

        $this->fields['anchor'] = $anchor;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'date-interval',
        ];
        if (array_key_exists('duration', $this->fields)) {
            $data['duration'] = $this->fields['duration'];
        }
        if (array_key_exists('unit', $this->fields)) {
            $data['unit'] = $this->fields['unit'];
        }
        if (array_key_exists('anchor', $this->fields)) {
            $data['anchor'] = $this->fields['anchor']?->jsonSerialize();
        }

        return $data;
    }
}
