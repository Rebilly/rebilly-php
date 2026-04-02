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
use Rebilly\Sdk\Trait\HasMetadata;

class DashboardResponseSegmentsTimeseries implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getDate(): ?string
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|string $date): static
    {
        $this->fields['date'] = $date;

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
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return $data;
    }
}
