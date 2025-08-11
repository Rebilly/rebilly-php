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

class ThreeColumnsTimelineTableData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('attribute', $data)) {
            $this->setAttribute($data['attribute']);
        }
        if (array_key_exists('previousValue', $data)) {
            $this->setPreviousValue($data['previousValue']);
        }
        if (array_key_exists('newValue', $data)) {
            $this->setNewValue($data['newValue']);
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

    public function getPreviousValue(): null|bool|float|int|string
    {
        return $this->fields['previousValue'] ?? null;
    }

    public function setPreviousValue(null|bool|float|int|string $previousValue): static
    {
        if (is_string($previousValue)) {
            $previousValue = (float) $previousValue;
        }

        $this->fields['previousValue'] = $previousValue;

        return $this;
    }

    public function getNewValue(): null|bool|float|int|string
    {
        return $this->fields['newValue'] ?? null;
    }

    public function setNewValue(null|bool|float|int|string $newValue): static
    {
        if (is_string($newValue)) {
            $newValue = (float) $newValue;
        }

        $this->fields['newValue'] = $newValue;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('attribute', $this->fields)) {
            $data['attribute'] = $this->fields['attribute'];
        }
        if (array_key_exists('previousValue', $this->fields)) {
            $data['previousValue'] = $this->fields['previousValue'];
        }
        if (array_key_exists('newValue', $this->fields)) {
            $data['newValue'] = $this->fields['newValue'];
        }

        return $data;
    }
}
