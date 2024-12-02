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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('quantityFilled', $this->fields)) {
            $data['quantityFilled'] = $this->fields['quantityFilled'];
        }

        return $data;
    }
}
