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

class StringCustomFieldAdditionalSchema implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('allowedValues', $data)) {
            $this->setAllowedValues($data['allowedValues']);
        }
        if (array_key_exists('maxLength', $data)) {
            $this->setMaxLength($data['maxLength']);
        }
        if (array_key_exists('pattern', $data)) {
            $this->setPattern($data['pattern']);
        }
        if (array_key_exists('required', $data)) {
            $this->setRequired($data['required']);
        }
        if (array_key_exists('default', $data)) {
            $this->setDefault($data['default']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getAllowedValues(): ?array
    {
        return $this->fields['allowedValues'] ?? null;
    }

    /**
     * @param null|string[] $allowedValues
     */
    public function setAllowedValues(null|array $allowedValues): static
    {
        $this->fields['allowedValues'] = $allowedValues;

        return $this;
    }

    public function getMaxLength(): ?int
    {
        return $this->fields['maxLength'] ?? null;
    }

    public function setMaxLength(null|int $maxLength): static
    {
        $this->fields['maxLength'] = $maxLength;

        return $this;
    }

    public function getPattern(): ?string
    {
        return $this->fields['pattern'] ?? null;
    }

    public function setPattern(null|string $pattern): static
    {
        $this->fields['pattern'] = $pattern;

        return $this;
    }

    public function getRequired(): ?bool
    {
        return $this->fields['required'] ?? null;
    }

    public function setRequired(null|bool $required): static
    {
        $this->fields['required'] = $required;

        return $this;
    }

    public function getDefault(): ?string
    {
        return $this->fields['default'] ?? null;
    }

    public function setDefault(null|string $default): static
    {
        $this->fields['default'] = $default;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('allowedValues', $this->fields)) {
            $data['allowedValues'] = $this->fields['allowedValues'];
        }
        if (array_key_exists('maxLength', $this->fields)) {
            $data['maxLength'] = $this->fields['maxLength'];
        }
        if (array_key_exists('pattern', $this->fields)) {
            $data['pattern'] = $this->fields['pattern'];
        }
        if (array_key_exists('required', $this->fields)) {
            $data['required'] = $this->fields['required'];
        }
        if (array_key_exists('default', $this->fields)) {
            $data['default'] = $this->fields['default'];
        }

        return $data;
    }
}
