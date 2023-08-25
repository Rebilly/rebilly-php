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

class ReportRetentionPercentageData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('subscriptionsCount', $data)) {
            $this->setSubscriptionsCount($data['subscriptionsCount']);
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

    public function getSubscriptionsCount(): ?int
    {
        return $this->fields['subscriptionsCount'] ?? null;
    }

    public function setSubscriptionsCount(null|int $subscriptionsCount): static
    {
        $this->fields['subscriptionsCount'] = $subscriptionsCount;

        return $this;
    }

    /**
     * @return null|ReportRetentionPercentageDataPeriods[]
     */
    public function getPeriods(): ?array
    {
        return $this->fields['periods'] ?? null;
    }

    /**
     * @param null|array[]|ReportRetentionPercentageDataPeriods[] $periods
     */
    public function setPeriods(null|array $periods): static
    {
        $periods = $periods !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof ReportRetentionPercentageDataPeriods ? $value : ReportRetentionPercentageDataPeriods::from($value)) : null,
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
        if (array_key_exists('subscriptionsCount', $this->fields)) {
            $data['subscriptionsCount'] = $this->fields['subscriptionsCount'];
        }
        if (array_key_exists('periods', $this->fields)) {
            $data['periods'] = $this->fields['periods'];
        }

        return $data;
    }
}
