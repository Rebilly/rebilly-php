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

class GatewayAccountFinancialSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('settlementSettings', $data)) {
            $this->setSettlementSettings($data['settlementSettings']);
        }
        if (array_key_exists('riskReserveSettings', $data)) {
            $this->setRiskReserveSettings($data['riskReserveSettings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSettlementSettings(): SettlementSettings
    {
        return $this->fields['settlementSettings'];
    }

    public function setSettlementSettings(SettlementSettings|array $settlementSettings): static
    {
        if (!($settlementSettings instanceof SettlementSettings)) {
            $settlementSettings = SettlementSettings::from($settlementSettings);
        }

        $this->fields['settlementSettings'] = $settlementSettings;

        return $this;
    }

    /**
     * @return null|GatewayAccountFinancialSettingsRiskReserveSettings[]
     */
    public function getRiskReserveSettings(): ?array
    {
        return $this->fields['riskReserveSettings'] ?? null;
    }

    /**
     * @param null|array[]|GatewayAccountFinancialSettingsRiskReserveSettings[] $riskReserveSettings
     */
    public function setRiskReserveSettings(null|array $riskReserveSettings): static
    {
        $riskReserveSettings = $riskReserveSettings !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof GatewayAccountFinancialSettingsRiskReserveSettings ? $value : GatewayAccountFinancialSettingsRiskReserveSettings::from($value)) : null,
            $riskReserveSettings,
        ) : null;

        $this->fields['riskReserveSettings'] = $riskReserveSettings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('settlementSettings', $this->fields)) {
            $data['settlementSettings'] = $this->fields['settlementSettings']?->jsonSerialize();
        }
        if (array_key_exists('riskReserveSettings', $this->fields)) {
            $data['riskReserveSettings'] = $this->fields['riskReserveSettings'];
        }

        return $data;
    }
}
