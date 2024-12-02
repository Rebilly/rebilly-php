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

class PlanFormulaFlatRate implements PlanPriceFormula
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
        if (array_key_exists('minQuantity', $data)) {
            $this->setMinQuantity($data['minQuantity']);
        }
        if (array_key_exists('maxQuantity', $data)) {
            $this->setMaxQuantity($data['maxQuantity']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFormula(): string
    {
        return 'flat-rate';
    }

    public function getPrice(): float
    {
        return $this->fields['price'];
    }

    public function setPrice(float|string $price): static
    {
        if (is_string($price)) {
            $price = (float) $price;
        }

        $this->fields['price'] = $price;

        return $this;
    }

    public function getMinQuantity(): ?int
    {
        return $this->fields['minQuantity'] ?? null;
    }

    public function setMinQuantity(null|int $minQuantity): static
    {
        $this->fields['minQuantity'] = $minQuantity;

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
        $data = [
            'formula' => 'flat-rate',
        ];
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }
        if (array_key_exists('minQuantity', $this->fields)) {
            $data['minQuantity'] = $this->fields['minQuantity'];
        }
        if (array_key_exists('maxQuantity', $this->fields)) {
            $data['maxQuantity'] = $this->fields['maxQuantity'];
        }

        return $data;
    }
}
