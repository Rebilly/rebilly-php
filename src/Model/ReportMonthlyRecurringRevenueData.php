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

class ReportMonthlyRecurringRevenueData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('breakdown', $data)) {
            $this->setBreakdown($data['breakdown']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPeriod(): ?string
    {
        return $this->fields['period'] ?? null;
    }

    public function setPeriod(null|string $period): static
    {
        $this->fields['period'] = $period;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|float|string $total): static
    {
        if (is_string($total)) {
            $total = (float) $total;
        }

        $this->fields['total'] = $total;

        return $this;
    }

    public function getBreakdown(): ?ReportMonthlyRecurringRevenueBreakdown
    {
        return $this->fields['breakdown'] ?? null;
    }

    public function setBreakdown(null|ReportMonthlyRecurringRevenueBreakdown|array $breakdown): static
    {
        if ($breakdown !== null && !($breakdown instanceof ReportMonthlyRecurringRevenueBreakdown)) {
            $breakdown = ReportMonthlyRecurringRevenueBreakdown::from($breakdown);
        }

        $this->fields['breakdown'] = $breakdown;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period'];
        }
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('breakdown', $this->fields)) {
            $data['breakdown'] = $this->fields['breakdown']?->jsonSerialize();
        }

        return $data;
    }
}
