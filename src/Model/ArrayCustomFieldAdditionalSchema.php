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

class ArrayCustomFieldAdditionalSchema implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('allowedValues', $data)) {
            $this->setAllowedValues($data['allowedValues']);
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

    public function getRequired(): ?bool
    {
        return $this->fields['required'] ?? null;
    }

    public function setRequired(null|bool $required): static
    {
        $this->fields['required'] = $required;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getDefault(): ?array
    {
        return $this->fields['default'] ?? null;
    }

    /**
     * @param null|string[] $default
     */
    public function setDefault(null|array $default): static
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
        if (array_key_exists('required', $this->fields)) {
            $data['required'] = $this->fields['required'];
        }
        if (array_key_exists('default', $this->fields)) {
            $data['default'] = $this->fields['default'];
        }

        return $data;
    }
}
