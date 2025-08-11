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

class JournalSummaryReportData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
        if (array_key_exists('totalAmount', $data)) {
            $this->setTotalAmount($data['totalAmount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
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

    public function getTotalAmount(): ?float
    {
        return $this->fields['totalAmount'] ?? null;
    }

    public function setTotalAmount(null|float|string $totalAmount): static
    {
        if (is_string($totalAmount)) {
            $totalAmount = (float) $totalAmount;
        }

        $this->fields['totalAmount'] = $totalAmount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    /**
     * @return null|JournalSummaryReportDataBreakdown[]
     */
    public function getBreakdown(): ?array
    {
        return $this->fields['breakdown'] ?? null;
    }

    /**
     * @param null|array[]|JournalSummaryReportDataBreakdown[] $breakdown
     */
    public function setBreakdown(null|array $breakdown): static
    {
        $breakdown = $breakdown !== null ? array_map(
            fn ($value) => $value instanceof JournalSummaryReportDataBreakdown ? $value : JournalSummaryReportDataBreakdown::from($value),
            $breakdown,
        ) : null;

        $this->fields['breakdown'] = $breakdown;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period'];
        }
        if (array_key_exists('totalAmount', $this->fields)) {
            $data['totalAmount'] = $this->fields['totalAmount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('breakdown', $this->fields)) {
            $data['breakdown'] = $this->fields['breakdown'] !== null
                ? array_map(
                    static fn (JournalSummaryReportDataBreakdown $journalSummaryReportDataBreakdown) => $journalSummaryReportDataBreakdown->jsonSerialize(),
                    $this->fields['breakdown'],
                )
                : null;
        }

        return $data;
    }
}
