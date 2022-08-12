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

class DayOfWeek extends CommonScheduleInstruction
{
    public const METHOD_INTELLIGENT = 'intelligent';

    public const METHOD_IMMEDIATELY = 'immediately';

    public const METHOD_DATE_INTERVAL = 'date-interval';

    public const METHOD_DAY_OF_MONTH = 'day-of-month';

    public const METHOD_DAY_OF_WEEK = 'day-of-week';

    public const WEEK_NEXT = 'next';

    public const WEEK_FIRST_IN_MONTH = 'first-in-month';

    public const WEEK_LAST_IN_MONTH = 'last-in-month';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'day-of-week',
        ] + $data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
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

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getDay(): DayOfWeekLong
    {
        return $this->fields['day'];
    }

    public function setDay(DayOfWeekLong|string $day): self
    {
        if (!($day instanceof \Rebilly\Sdk\Model\DayOfWeekLong)) {
            $day = \Rebilly\Sdk\Model\DayOfWeekLong::from($day);
        }

        $this->fields['day'] = $day;

        return $this;
    }

    /**
     * @psalm-return self::WEEK_*|null $week
     */
    public function getWeek(): ?string
    {
        return $this->fields['week'] ?? null;
    }

    /**
     * @psalm-param self::WEEK_*|null $week
     */
    public function setWeek(null|string $week): self
    {
        $this->fields['week'] = $week;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->fields['time'] ?? null;
    }

    public function setTime(null|string $time): self
    {
        $this->fields['time'] = $time;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('day', $this->fields)) {
            $data['day'] = $this->fields['day']?->value;
        }
        if (array_key_exists('week', $this->fields)) {
            $data['week'] = $this->fields['week'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time'];
        }

        return parent::jsonSerialize() + $data;
    }
}
