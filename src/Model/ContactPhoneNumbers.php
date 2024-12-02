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

class ContactPhoneNumbers implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('label', $data)) {
            $this->setLabel($data['label']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('primary', $data)) {
            $this->setPrimary($data['primary']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getLabel(): string
    {
        return $this->fields['label'];
    }

    public function setLabel(string $label): static
    {
        $this->fields['label'] = $label;

        return $this;
    }

    public function getValue(): string
    {
        return $this->fields['value'];
    }

    public function setValue(string $value): static
    {
        $this->fields['value'] = $value;

        return $this;
    }

    public function getPrimary(): ?bool
    {
        return $this->fields['primary'] ?? null;
    }

    public function setPrimary(null|bool $primary): static
    {
        $this->fields['primary'] = $primary;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('label', $this->fields)) {
            $data['label'] = $this->fields['label'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('primary', $this->fields)) {
            $data['primary'] = $this->fields['primary'];
        }

        return $data;
    }
}
