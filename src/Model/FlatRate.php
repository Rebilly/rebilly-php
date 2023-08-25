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

class FlatRate implements PlanPriceFormula, JsonSerializable
{
    public const FORMULA_FLAT_RATE = 'flat-rate';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('formula', $data)) {
            $this->setFormula($data['formula']);
        }
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
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
        return $this->fields['formula'];
    }

    public function setFormula(string $formula): static
    {
        $this->fields['formula'] = $formula;

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
     * @return StairstepBrackets[]
     */
    public function getBrackets(): array
    {
        return $this->fields['brackets'];
    }

    /**
     * @param array[]|StairstepBrackets[] $brackets
     */
    public function setBrackets(array $brackets): static
    {
        $brackets = array_map(
            fn ($value) => $value !== null ? ($value instanceof StairstepBrackets ? $value : StairstepBrackets::from($value)) : null,
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('formula', $this->fields)) {
            $data['formula'] = $this->fields['formula'];
        }
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
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
