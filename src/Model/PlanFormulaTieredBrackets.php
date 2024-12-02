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

class PlanFormulaTieredBrackets implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
        if (array_key_exists('maxQuantity', $data)) {
            $this->setMaxQuantity($data['maxQuantity']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPrice(): ?float
    {
        return $this->fields['price'] ?? null;
    }

    public function setPrice(null|float|string $price): static
    {
        if (is_string($price)) {
            $price = (float) $price;
        }

        $this->fields['price'] = $price;

        return $this;
    }

    public function getMaxQuantity(): ?int
    {
        return $this->fields['maxQuantity'] ?? null;
    }

    public function setMaxQuantity(null|int $maxQuantity): static
    {
        $this->fields['maxQuantity'] = $maxQuantity;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }
        if (array_key_exists('maxQuantity', $this->fields)) {
            $data['maxQuantity'] = $this->fields['maxQuantity'];
        }

        return $data;
    }
}
