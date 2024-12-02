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

class ReportRetentionValueData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('customersCount', $data)) {
            $this->setCustomersCount($data['customersCount']);
        }
        if (array_key_exists('periods', $data)) {
            $this->setPeriods($data['periods']);
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

    public function getCustomersCount(): ?int
    {
        return $this->fields['customersCount'] ?? null;
    }

    public function setCustomersCount(null|int $customersCount): static
    {
        $this->fields['customersCount'] = $customersCount;

        return $this;
    }

    /**
     * @return null|ReportRetentionValueDataPeriods[]
     */
    public function getPeriods(): ?array
    {
        return $this->fields['periods'] ?? null;
    }

    /**
     * @param null|array[]|ReportRetentionValueDataPeriods[] $periods
     */
    public function setPeriods(null|array $periods): static
    {
        $periods = $periods !== null ? array_map(
            fn ($value) => $value instanceof ReportRetentionValueDataPeriods ? $value : ReportRetentionValueDataPeriods::from($value),
            $periods,
        ) : null;

        $this->fields['periods'] = $periods;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('customersCount', $this->fields)) {
            $data['customersCount'] = $this->fields['customersCount'];
        }
        if (array_key_exists('periods', $this->fields)) {
            $data['periods'] = $this->fields['periods'] !== null
                ? array_map(
                    static fn (ReportRetentionValueDataPeriods $reportRetentionValueDataPeriods) => $reportRetentionValueDataPeriods->jsonSerialize(),
                    $this->fields['periods'],
                )
                : null;
        }

        return $data;
    }
}
