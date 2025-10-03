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

class JournalSummaryReport implements JsonSerializable
{
    public const AGGREGATION_FIELD_CREDIT_ACCOUNT_ID = 'journalRecord.creditAccountId';

    public const AGGREGATION_FIELD_DEBIT_ACCOUNT_ID = 'journalRecord.debitAccountId';

    public const AMOUNT_FIELD_ESTIMATED_AMOUNT = 'journalRecord.estimatedAmount';

    public const AMOUNT_FIELD_RECOGNIZED_AMOUNT = 'journalRecord.recognizedAmount';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationField', $data)) {
            $this->setAggregationField($data['aggregationField']);
        }
        if (array_key_exists('amountField', $data)) {
            $this->setAmountField($data['amountField']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('periodStart', $data)) {
            $this->setPeriodStart($data['periodStart']);
        }
        if (array_key_exists('periodEnd', $data)) {
            $this->setPeriodEnd($data['periodEnd']);
        }
        if (array_key_exists('journalAccountIds', $data)) {
            $this->setJournalAccountIds($data['journalAccountIds']);
        }
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAggregationField(): ?string
    {
        return $this->fields['aggregationField'] ?? null;
    }

    public function setAggregationField(null|string $aggregationField): static
    {
        $this->fields['aggregationField'] = $aggregationField;

        return $this;
    }

    public function getAmountField(): ?string
    {
        return $this->fields['amountField'] ?? null;
    }

    public function setAmountField(null|string $amountField): static
    {
        $this->fields['amountField'] = $amountField;

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

    public function getPeriodStart(): ?string
    {
        return $this->fields['periodStart'] ?? null;
    }

    public function setPeriodStart(null|string $periodStart): static
    {
        $this->fields['periodStart'] = $periodStart;

        return $this;
    }

    public function getPeriodEnd(): ?string
    {
        return $this->fields['periodEnd'] ?? null;
    }

    public function setPeriodEnd(null|string $periodEnd): static
    {
        $this->fields['periodEnd'] = $periodEnd;

        return $this;
    }

    public function getJournalAccountIds(): ?string
    {
        return $this->fields['journalAccountIds'] ?? null;
    }

    public function setJournalAccountIds(null|string $journalAccountIds): static
    {
        $this->fields['journalAccountIds'] = $journalAccountIds;

        return $this;
    }

    /**
     * @return null|JournalSummaryReportData[]
     */
    public function getData(): ?array
    {
        return $this->fields['data'] ?? null;
    }

    /**
     * @param null|array[]|JournalSummaryReportData[] $data
     */
    public function setData(null|array $data): static
    {
        $data = $data !== null ? array_map(
            fn ($value) => $value instanceof JournalSummaryReportData ? $value : JournalSummaryReportData::from($value),
            $data,
        ) : null;

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationField', $this->fields)) {
            $data['aggregationField'] = $this->fields['aggregationField'];
        }
        if (array_key_exists('amountField', $this->fields)) {
            $data['amountField'] = $this->fields['amountField'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('periodStart', $this->fields)) {
            $data['periodStart'] = $this->fields['periodStart'];
        }
        if (array_key_exists('periodEnd', $this->fields)) {
            $data['periodEnd'] = $this->fields['periodEnd'];
        }
        if (array_key_exists('journalAccountIds', $this->fields)) {
            $data['journalAccountIds'] = $this->fields['journalAccountIds'];
        }
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'] !== null
                ? array_map(
                    static fn (JournalSummaryReportData $journalSummaryReportData) => $journalSummaryReportData->jsonSerialize(),
                    $this->fields['data'],
                )
                : null;
        }

        return $data;
    }
}
