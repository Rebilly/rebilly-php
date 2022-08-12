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

class ThreeData implements JsonSerializable
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

    public function setAttribute(null|string $attribute): self
    {
        $this->fields['attribute'] = $attribute;

        return $this;
    }

    public function getPreviousValue(): ?string
    {
        return $this->fields['previousValue'] ?? null;
    }

    public function setPreviousValue(null|string $previousValue): self
    {
        $this->fields['previousValue'] = $previousValue;

        return $this;
    }

    public function getNewValue(): ?string
    {
        return $this->fields['newValue'] ?? null;
    }

    public function setNewValue(null|string $newValue): self
    {
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
