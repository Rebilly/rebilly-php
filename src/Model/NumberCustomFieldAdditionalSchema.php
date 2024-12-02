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

class NumberCustomFieldAdditionalSchema implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('minimum', $data)) {
            $this->setMinimum($data['minimum']);
        }
        if (array_key_exists('maximum', $data)) {
            $this->setMaximum($data['maximum']);
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

    public function getMinimum(): ?float
    {
        return $this->fields['minimum'] ?? null;
    }

    public function setMinimum(null|float|string $minimum): static
    {
        if (is_string($minimum)) {
            $minimum = (float) $minimum;
        }

        $this->fields['minimum'] = $minimum;

        return $this;
    }

    public function getMaximum(): ?float
    {
        return $this->fields['maximum'] ?? null;
    }

    public function setMaximum(null|float|string $maximum): static
    {
        if (is_string($maximum)) {
            $maximum = (float) $maximum;
        }

        $this->fields['maximum'] = $maximum;

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

    public function getDefault(): ?float
    {
        return $this->fields['default'] ?? null;
    }

    public function setDefault(null|float|string $default): static
    {
        if (is_string($default)) {
            $default = (float) $default;
        }

        $this->fields['default'] = $default;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('minimum', $this->fields)) {
            $data['minimum'] = $this->fields['minimum'];
        }
        if (array_key_exists('maximum', $this->fields)) {
            $data['maximum'] = $this->fields['maximum'];
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
