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

class InvoiceTimeShiftDueTimeShift implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('duration', $this->fields)) {
            $data['duration'] = $this->fields['duration'];
        }
        if (array_key_exists('unit', $this->fields)) {
            $data['unit'] = $this->fields['unit'];
        }

        return $data;
    }
}
