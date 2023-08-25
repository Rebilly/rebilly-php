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

class TimeSeriesTransactionDataSubaggregates implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('subaggregate', $data)) {
            $this->setSubaggregate($data['subaggregate']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSubaggregate(): ?string
    {
        return $this->fields['subaggregate'] ?? null;
    }

    public function setSubaggregate(null|string $subaggregate): static
    {
        $this->fields['subaggregate'] = $subaggregate;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->fields['value'] ?? null;
    }

    public function setValue(null|float|string $value): static
    {
        if (is_string($value)) {
            $value = (float) $value;
        }

        $this->fields['value'] = $value;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('subaggregate', $this->fields)) {
            $data['subaggregate'] = $this->fields['subaggregate'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return $data;
    }
}
