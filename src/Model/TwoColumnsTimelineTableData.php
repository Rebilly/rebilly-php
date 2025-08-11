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

class TwoColumnsTimelineTableData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('attribute', $data)) {
            $this->setAttribute($data['attribute']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAttribute(): ?string
    {
        return $this->fields['attribute'] ?? null;
    }

    public function setAttribute(null|string $attribute): static
    {
        $this->fields['attribute'] = $attribute;

        return $this;
    }

    public function getValue(): null|bool|float|int|string
    {
        return $this->fields['value'] ?? null;
    }

    public function setValue(null|bool|float|int|string $value): static
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
        if (array_key_exists('attribute', $this->fields)) {
            $data['attribute'] = $this->fields['attribute'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return $data;
    }
}
