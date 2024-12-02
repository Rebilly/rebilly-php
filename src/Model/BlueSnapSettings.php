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

class BlueSnapSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('enableMoto', $data)) {
            $this->setEnableMoto($data['enableMoto']);
        }
        if (array_key_exists('salesTaxAmount', $data)) {
            $this->setSalesTaxAmount($data['salesTaxAmount']);
        }
        if (array_key_exists('metadataCustomField', $data)) {
            $this->setMetadataCustomField($data['metadataCustomField']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEnableMoto(): ?bool
    {
        return $this->fields['enableMoto'] ?? null;
    }

    public function setEnableMoto(null|bool $enableMoto): static
    {
        $this->fields['enableMoto'] = $enableMoto;

        return $this;
    }

    public function getSalesTaxAmount(): ?float
    {
        return $this->fields['salesTaxAmount'] ?? null;
    }

    public function setSalesTaxAmount(null|float|string $salesTaxAmount): static
    {
        if (is_string($salesTaxAmount)) {
            $salesTaxAmount = (float) $salesTaxAmount;
        }

        $this->fields['salesTaxAmount'] = $salesTaxAmount;

        return $this;
    }

    public function getMetadataCustomField(): ?string
    {
        return $this->fields['metadataCustomField'] ?? null;
    }

    public function setMetadataCustomField(null|string $metadataCustomField): static
    {
        $this->fields['metadataCustomField'] = $metadataCustomField;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enableMoto', $this->fields)) {
            $data['enableMoto'] = $this->fields['enableMoto'];
        }
        if (array_key_exists('salesTaxAmount', $this->fields)) {
            $data['salesTaxAmount'] = $this->fields['salesTaxAmount'];
        }
        if (array_key_exists('metadataCustomField', $this->fields)) {
            $data['metadataCustomField'] = $this->fields['metadataCustomField'];
        }

        return $data;
    }
}
