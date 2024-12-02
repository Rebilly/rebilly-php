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

class TaxNumber implements JsonSerializable
{
    public const TYPE_EU_VAT = 'eu-vat';

    public const TYPE_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('isDefault', $data)) {
            $this->setIsDefault($data['isDefault']);
        }
        if (array_key_exists('isValid', $data)) {
            $this->setIsValid($data['isValid']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

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

    public function getIsDefault(): ?bool
    {
        return $this->fields['isDefault'] ?? null;
    }

    public function setIsDefault(null|bool $isDefault): static
    {
        $this->fields['isDefault'] = $isDefault;

        return $this;
    }

    public function getIsValid(): ?bool
    {
        return $this->fields['isValid'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('isDefault', $this->fields)) {
            $data['isDefault'] = $this->fields['isDefault'];
        }
        if (array_key_exists('isValid', $this->fields)) {
            $data['isValid'] = $this->fields['isValid'];
        }

        return $data;
    }

    private function setIsValid(null|bool $isValid): static
    {
        $this->fields['isValid'] = $isValid;

        return $this;
    }
}
