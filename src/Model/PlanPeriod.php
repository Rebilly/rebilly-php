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

class PlanPeriod implements JsonSerializable
{
    public const UNIT_DAY = 'day';

    public const UNIT_WEEK = 'week';

    public const UNIT_MONTH = 'month';

    public const UNIT_YEAR = 'year';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('unit', $data)) {
            $this->setUnit($data['unit']);
        }
        if (array_key_exists('length', $data)) {
            $this->setLength($data['length']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::UNIT_* $unit
     */
    public function getUnit(): string
    {
        return $this->fields['unit'];
    }

    /**
     * @psalm-param self::UNIT_* $unit
     */
    public function setUnit(string $unit): static
    {
        $this->fields['unit'] = $unit;

        return $this;
    }

    public function getLength(): int
    {
        return $this->fields['length'];
    }

    public function setLength(int $length): static
    {
        $this->fields['length'] = $length;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('unit', $this->fields)) {
            $data['unit'] = $this->fields['unit'];
        }
        if (array_key_exists('length', $this->fields)) {
            $data['length'] = $this->fields['length'];
        }

        return $data;
    }
}
