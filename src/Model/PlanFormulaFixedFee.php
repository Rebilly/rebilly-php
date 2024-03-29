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

class PlanFormulaFixedFee implements PlanPriceFormula, JsonSerializable
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
        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFormula(): string
    {
        return 'fixed-fee';
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

    /**
     * @return PlanFormulaStairstepBrackets[]
     */
    public function getBrackets(): array
    {
        return $this->fields['brackets'];
    }

    /**
     * @param array[]|PlanFormulaStairstepBrackets[] $brackets
     */
    public function setBrackets(array $brackets): static
    {
        $brackets = array_map(
            fn ($value) => $value instanceof PlanFormulaStairstepBrackets ? $value : PlanFormulaStairstepBrackets::from($value),
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'formula' => 'fixed-fee',
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
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = $this->fields['brackets'];
        }

        return $data;
    }
}
