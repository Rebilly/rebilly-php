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
use Rebilly\Sdk\Trait\HasMetadata;

class SettlementSettingsAdvancedSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('settlementCurrency', $data)) {
            $this->setSettlementCurrency($data['settlementCurrency']);
        }
        if (array_key_exists('settlementPeriod', $data)) {
            $this->setSettlementPeriod($data['settlementPeriod']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getFilter(): string
    {
        return $this->fields['filter'];
    }

    public function setFilter(string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getSettlementCurrency(): ?string
    {
        return $this->fields['settlementCurrency'] ?? null;
    }

    public function setSettlementCurrency(null|string $settlementCurrency): static
    {
        $this->fields['settlementCurrency'] = $settlementCurrency;

        return $this;
    }

    public function getSettlementPeriod(): ?SettlementPeriod
    {
        return $this->fields['settlementPeriod'] ?? null;
    }

    public function setSettlementPeriod(null|SettlementPeriod|array $settlementPeriod): static
    {
        if ($settlementPeriod !== null && !($settlementPeriod instanceof SettlementPeriod)) {
            $settlementPeriod = SettlementPeriodFactory::from($settlementPeriod);
        }

        $this->fields['settlementPeriod'] = $settlementPeriod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('settlementCurrency', $this->fields)) {
            $data['settlementCurrency'] = $this->fields['settlementCurrency'];
        }
        if (array_key_exists('settlementPeriod', $this->fields)) {
            $data['settlementPeriod'] = $this->fields['settlementPeriod']?->jsonSerialize();
        }

        return $data;
    }
}
