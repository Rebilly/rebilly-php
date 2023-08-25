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

class ReportRetentionPercentageDataPeriods implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
        if (array_key_exists('retentionRatio', $data)) {
            $this->setRetentionRatio($data['retentionRatio']);
        }
        if (array_key_exists('canceledSubscriptionsCount', $data)) {
            $this->setCanceledSubscriptionsCount($data['canceledSubscriptionsCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPeriod(): ?int
    {
        return $this->fields['period'] ?? null;
    }

    public function setPeriod(null|int $period): static
    {
        $this->fields['period'] = $period;

        return $this;
    }

    public function getRetentionRatio(): ?float
    {
        return $this->fields['retentionRatio'] ?? null;
    }

    public function setRetentionRatio(null|float|string $retentionRatio): static
    {
        if (is_string($retentionRatio)) {
            $retentionRatio = (float) $retentionRatio;
        }

        $this->fields['retentionRatio'] = $retentionRatio;

        return $this;
    }

    public function getCanceledSubscriptionsCount(): ?int
    {
        return $this->fields['canceledSubscriptionsCount'] ?? null;
    }

    public function setCanceledSubscriptionsCount(null|int $canceledSubscriptionsCount): static
    {
        $this->fields['canceledSubscriptionsCount'] = $canceledSubscriptionsCount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period'];
        }
        if (array_key_exists('retentionRatio', $this->fields)) {
            $data['retentionRatio'] = $this->fields['retentionRatio'];
        }
        if (array_key_exists('canceledSubscriptionsCount', $this->fields)) {
            $data['canceledSubscriptionsCount'] = $this->fields['canceledSubscriptionsCount'];
        }

        return $data;
    }
}
