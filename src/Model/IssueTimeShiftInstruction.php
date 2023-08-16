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

use InvalidArgumentException;
use JsonSerializable;

class IssueTimeShiftInstruction implements JsonSerializable
{
    public const CHRONOLOGY_BEFORE = 'before';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('chronology', $data)) {
            $this->setChronology($data['chronology']);
        }
        if (array_key_exists('duration', $data)) {
            $this->setDuration($data['duration']);
        }
        if (array_key_exists('unit', $data)) {
            $this->setUnit($data['unit']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::CHRONOLOGY_* $chronology
     */
    public function getChronology(): string
    {
        return $this->fields['chronology'];
    }

    /**
     * @psalm-param self::CHRONOLOGY_* $chronology
     */
    public function setChronology(string $chronology): static
    {
        $this->fields['chronology'] = $chronology;

        return $this;
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

    public function getUnit(): TimeUnit|TimePluralUnit
    {
        return $this->fields['unit'];
    }

    public function setUnit(string|TimeUnit|TimePluralUnit $unit): static
    {
        $unit = $this->ensureUnit($unit);

        $this->fields['unit'] = $unit;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('chronology', $this->fields)) {
            $data['chronology'] = $this->fields['chronology'];
        }
        if (array_key_exists('duration', $this->fields)) {
            $data['duration'] = $this->fields['duration'];
        }
        if (array_key_exists('unit', $this->fields)) {
            $data['unit'] = $this->fields['unit'];
        }

        return $data;
    }

    protected function ensureUnit(string|TimeUnit|TimePluralUnit $data): TimeUnit|TimePluralUnit
    {
        if (
            $data instanceof TimeUnit
            || $data instanceof TimePluralUnit
        ) {
            return $data;
        }
        $candidates = [];
        $candidates[] = TimeUnit::tryFrom($data);
        $candidates[] = TimePluralUnit::tryFrom($data);

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if (
            $determined[0] instanceof TimeUnit
            || $determined[0] instanceof TimePluralUnit
        ) {
            return $determined[0];
        }

        throw new InvalidArgumentException('Could not instantiate unit with the given value');
    }
}
