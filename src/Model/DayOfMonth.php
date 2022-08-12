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

class DayOfMonth extends CommonScheduleInstruction
{
    public const METHOD_INTELLIGENT = 'intelligent';

    public const METHOD_IMMEDIATELY = 'immediately';

    public const METHOD_DATE_INTERVAL = 'date-interval';

    public const METHOD_DAY_OF_MONTH = 'day-of-month';

    public const METHOD_DAY_OF_WEEK = 'day-of-week';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'day-of-month',
        ] + $data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
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

    public function getDay(): int
    {
        return $this->fields['day'];
    }

    public function setDay(int $day): self
    {
        $this->fields['day'] = $day;

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
            $data['day'] = $this->fields['day'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time'];
        }

        return parent::jsonSerialize() + $data;
    }
}
