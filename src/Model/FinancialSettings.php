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

class FinancialSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('riskReserveSettings', $data)) {
            $this->setRiskReserveSettings($data['riskReserveSettings']);
        }
        if (array_key_exists('settlementSettings', $data)) {
            $this->setSettlementSettings($data['settlementSettings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|FinancialSettingsRiskReserveSettings[]
     */
    public function getRiskReserveSettings(): ?array
    {
        return $this->fields['riskReserveSettings'] ?? null;
    }

    /**
     * @param null|FinancialSettingsRiskReserveSettings[] $riskReserveSettings
     */
    public function setRiskReserveSettings(null|array $riskReserveSettings): self
    {
        $riskReserveSettings = $riskReserveSettings !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof FinancialSettingsRiskReserveSettings ? $value : FinancialSettingsRiskReserveSettings::from($value)) : null, $riskReserveSettings) : null;

        $this->fields['riskReserveSettings'] = $riskReserveSettings;

        return $this;
    }

    public function getSettlementSettings(): ?FinancialSettingsSettlementSettings
    {
        return $this->fields['settlementSettings'] ?? null;
    }

    public function setSettlementSettings(null|FinancialSettingsSettlementSettings|array $settlementSettings): self
    {
        if ($settlementSettings !== null && !($settlementSettings instanceof FinancialSettingsSettlementSettings)) {
            $settlementSettings = FinancialSettingsSettlementSettings::from($settlementSettings);
        }

        $this->fields['settlementSettings'] = $settlementSettings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('riskReserveSettings', $this->fields)) {
            $data['riskReserveSettings'] = $this->fields['riskReserveSettings'];
        }
        if (array_key_exists('settlementSettings', $this->fields)) {
            $data['settlementSettings'] = $this->fields['settlementSettings']?->jsonSerialize();
        }

        return $data;
    }
}
