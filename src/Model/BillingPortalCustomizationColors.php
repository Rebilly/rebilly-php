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

class BillingPortalCustomizationColors implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('primary', $data)) {
            $this->setPrimary($data['primary']);
        }
        if (array_key_exists('secondary', $data)) {
            $this->setSecondary($data['secondary']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPrimary(): ?string
    {
        return $this->fields['primary'] ?? null;
    }

    public function setPrimary(null|string $primary): static
    {
        $this->fields['primary'] = $primary;

        return $this;
    }

    public function getSecondary(): ?string
    {
        return $this->fields['secondary'] ?? null;
    }

    public function setSecondary(null|string $secondary): static
    {
        $this->fields['secondary'] = $secondary;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('primary', $this->fields)) {
            $data['primary'] = $this->fields['primary'];
        }
        if (array_key_exists('secondary', $this->fields)) {
            $data['secondary'] = $this->fields['secondary'];
        }

        return $data;
    }
}
