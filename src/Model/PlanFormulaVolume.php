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

class PlanFormulaVolume implements PlanPriceFormula, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
        if (array_key_exists('maxQuantity', $data)) {
            $this->setMaxQuantity($data['maxQuantity']);
        }
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFormula(): string
    {
        return 'volume';
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
            fn ($value) => $value !== null ? ($value instanceof PlanFormulaStairstepBrackets ? $value : PlanFormulaStairstepBrackets::from($value)) : null,
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

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

    public function jsonSerialize(): array
    {
        $data = [
            'formula' => 'volume',
        ];
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = $this->fields['brackets'];
        }
        if (array_key_exists('maxQuantity', $this->fields)) {
            $data['maxQuantity'] = $this->fields['maxQuantity'];
        }
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }

        return $data;
    }
}
