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

class RenewalSalesData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('newSales', $data)) {
            $this->setNewSales($data['newSales']);
        }
        if (array_key_exists('newRefunds', $data)) {
            $this->setNewRefunds($data['newRefunds']);
        }
        if (array_key_exists('renewalSales', $data)) {
            $this->setRenewalSales($data['renewalSales']);
        }
        if (array_key_exists('renewalRefunds', $data)) {
            $this->setRenewalRefunds($data['renewalRefunds']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAggregationValue(): ?string
    {
        return $this->fields['aggregationValue'] ?? null;
    }

    public function setAggregationValue(null|string $aggregationValue): static
    {
        $this->fields['aggregationValue'] = $aggregationValue;

        return $this;
    }

    public function getNewSales(): ?float
    {
        return $this->fields['newSales'] ?? null;
    }

    public function setNewSales(null|float|string $newSales): static
    {
        if (is_string($newSales)) {
            $newSales = (float) $newSales;
        }

        $this->fields['newSales'] = $newSales;

        return $this;
    }

    public function getNewRefunds(): ?float
    {
        return $this->fields['newRefunds'] ?? null;
    }

    public function setNewRefunds(null|float|string $newRefunds): static
    {
        if (is_string($newRefunds)) {
            $newRefunds = (float) $newRefunds;
        }

        $this->fields['newRefunds'] = $newRefunds;

        return $this;
    }

    public function getRenewalSales(): ?float
    {
        return $this->fields['renewalSales'] ?? null;
    }

    public function setRenewalSales(null|float|string $renewalSales): static
    {
        if (is_string($renewalSales)) {
            $renewalSales = (float) $renewalSales;
        }

        $this->fields['renewalSales'] = $renewalSales;

        return $this;
    }

    public function getRenewalRefunds(): ?float
    {
        return $this->fields['renewalRefunds'] ?? null;
    }

    public function setRenewalRefunds(null|float|string $renewalRefunds): static
    {
        if (is_string($renewalRefunds)) {
            $renewalRefunds = (float) $renewalRefunds;
        }

        $this->fields['renewalRefunds'] = $renewalRefunds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('newSales', $this->fields)) {
            $data['newSales'] = $this->fields['newSales'];
        }
        if (array_key_exists('newRefunds', $this->fields)) {
            $data['newRefunds'] = $this->fields['newRefunds'];
        }
        if (array_key_exists('renewalSales', $this->fields)) {
            $data['renewalSales'] = $this->fields['renewalSales'];
        }
        if (array_key_exists('renewalRefunds', $this->fields)) {
            $data['renewalRefunds'] = $this->fields['renewalRefunds'];
        }

        return $data;
    }
}
