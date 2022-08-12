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

class FinancialSettingsRiskReserveSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('bips', $data)) {
            $this->setBips($data['bips']);
        }
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFilter(): string
    {
        return $this->fields['filter'];
    }

    public function setFilter(string $filter): self
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getBips(): float
    {
        return $this->fields['bips'];
    }

    public function setBips(float $bips): self
    {
        $this->fields['bips'] = $bips;

        return $this;
    }

    public function getPeriod(): RiskReservePeriod
    {
        return $this->fields['period'];
    }

    public function setPeriod(RiskReservePeriod|array $period): self
    {
        if (!($period instanceof \Rebilly\Sdk\Model\RiskReservePeriod)) {
            $period = \Rebilly\Sdk\Model\RiskReservePeriod::from($period);
        }

        $this->fields['period'] = $period;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('bips', $this->fields)) {
            $data['bips'] = $this->fields['bips'];
        }
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period']?->jsonSerialize();
        }

        return $data;
    }
}
