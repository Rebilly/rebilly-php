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

class FinancialSettingsSettlementSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('settlementCurrency', $data)) {
            $this->setSettlementCurrency($data['settlementCurrency']);
        }
        if (array_key_exists('settlementPeriod', $data)) {
            $this->setSettlementPeriod($data['settlementPeriod']);
        }
        if (array_key_exists('advancedSettings', $data)) {
            $this->setAdvancedSettings($data['advancedSettings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSettlementCurrency(): string
    {
        return $this->fields['settlementCurrency'];
    }

    public function setSettlementCurrency(string $settlementCurrency): static
    {
        $this->fields['settlementCurrency'] = $settlementCurrency;

        return $this;
    }

    public function getSettlementPeriod(): SettlementPeriod
    {
        return $this->fields['settlementPeriod'];
    }

    public function setSettlementPeriod(SettlementPeriod|array $settlementPeriod): static
    {
        if (!($settlementPeriod instanceof SettlementPeriod)) {
            $settlementPeriod = SettlementPeriod::from($settlementPeriod);
        }

        $this->fields['settlementPeriod'] = $settlementPeriod;

        return $this;
    }

    /**
     * @return null|FinancialSettingsSettlementSettingsAdvancedSettings[]
     */
    public function getAdvancedSettings(): ?array
    {
        return $this->fields['advancedSettings'] ?? null;
    }

    /**
     * @param null|FinancialSettingsSettlementSettingsAdvancedSettings[] $advancedSettings
     */
    public function setAdvancedSettings(null|array $advancedSettings): static
    {
        $advancedSettings = $advancedSettings !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof FinancialSettingsSettlementSettingsAdvancedSettings ? $value : FinancialSettingsSettlementSettingsAdvancedSettings::from($value)) : null, $advancedSettings) : null;

        $this->fields['advancedSettings'] = $advancedSettings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('settlementCurrency', $this->fields)) {
            $data['settlementCurrency'] = $this->fields['settlementCurrency'];
        }
        if (array_key_exists('settlementPeriod', $this->fields)) {
            $data['settlementPeriod'] = $this->fields['settlementPeriod']?->jsonSerialize();
        }
        if (array_key_exists('advancedSettings', $this->fields)) {
            $data['advancedSettings'] = $this->fields['advancedSettings'];
        }

        return $data;
    }
}
