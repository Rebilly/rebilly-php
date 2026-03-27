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

use Rebilly\Sdk\Trait\HasMetadata;

class PlanFormulaFixedFee implements PlanPriceFormula
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function jsonSerialize(): array
    {
        $data = [
            'formula' => 'fixed-fee',
        ];
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }

        return $data;
    }
}
