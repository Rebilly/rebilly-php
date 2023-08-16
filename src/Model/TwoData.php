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

class TwoData implements JsonSerializable
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

    public function getValue(): ?string
    {
        return $this->fields['value'] ?? null;
    }

    public function setValue(null|string $value): static
    {
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
