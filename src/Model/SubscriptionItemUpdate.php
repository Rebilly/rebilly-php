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

class SubscriptionItemUpdate implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('quantityFilled', $data)) {
            $this->setQuantityFilled($data['quantityFilled']);
        }
        if (array_key_exists('excludeFromMrr', $data)) {
            $this->setExcludeFromMrr($data['excludeFromMrr']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getQuantityFilled(): int
    {
        return $this->fields['quantityFilled'];
    }

    public function setQuantityFilled(int $quantityFilled): static
    {
        $this->fields['quantityFilled'] = $quantityFilled;

        return $this;
    }

    public function getExcludeFromMrr(): ?bool
    {
        return $this->fields['excludeFromMrr'] ?? null;
    }

    public function setExcludeFromMrr(null|bool $excludeFromMrr): static
    {
        $this->fields['excludeFromMrr'] = $excludeFromMrr;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('quantityFilled', $this->fields)) {
            $data['quantityFilled'] = $this->fields['quantityFilled'];
        }
        if (array_key_exists('excludeFromMrr', $this->fields)) {
            $data['excludeFromMrr'] = $this->fields['excludeFromMrr'];
        }

        return $data;
    }
}
