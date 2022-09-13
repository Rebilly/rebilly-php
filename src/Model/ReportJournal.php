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

class ReportJournal implements JsonSerializable
{
    public const AGGREGATION_FIELD_PRODUCT_ACCOUNTING_CODE = 'product.accountingCode';

    public const AGGREGATION_FIELD_PRODUCT_ID = 'product.id';

    public const AGGREGATION_FIELD_PLAN_ID = 'plan.id';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationField', $data)) {
            $this->setAggregationField($data['aggregationField']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('bookedFrom', $data)) {
            $this->setBookedFrom($data['bookedFrom']);
        }
        if (array_key_exists('bookedTo', $data)) {
            $this->setBookedTo($data['bookedTo']);
        }
        if (array_key_exists('recognizedAt', $data)) {
            $this->setRecognizedAt($data['recognizedAt']);
        }
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::AGGREGATION_FIELD_*|null $aggregationField
     */
    public function getAggregationField(): ?string
    {
        return $this->fields['aggregationField'] ?? null;
    }

    /**
     * @psalm-param self::AGGREGATION_FIELD_*|null $aggregationField
     */
    public function setAggregationField(null|string $aggregationField): self
    {
        $this->fields['aggregationField'] = $aggregationField;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getBookedFrom(): ?string
    {
        return $this->fields['bookedFrom'] ?? null;
    }

    public function setBookedFrom(null|string $bookedFrom): self
    {
        $this->fields['bookedFrom'] = $bookedFrom;

        return $this;
    }

    public function getBookedTo(): ?string
    {
        return $this->fields['bookedTo'] ?? null;
    }

    public function setBookedTo(null|string $bookedTo): self
    {
        $this->fields['bookedTo'] = $bookedTo;

        return $this;
    }

    public function getRecognizedAt(): ?string
    {
        return $this->fields['recognizedAt'] ?? null;
    }

    public function setRecognizedAt(null|string $recognizedAt): self
    {
        $this->fields['recognizedAt'] = $recognizedAt;

        return $this;
    }

    /**
     * @return null|ReportJournalData[]
     */
    public function getData(): ?array
    {
        return $this->fields['data'] ?? null;
    }

    /**
     * @param null|ReportJournalData[] $data
     */
    public function setData(null|array $data): self
    {
        $data = $data !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ReportJournalData ? $value : ReportJournalData::from($value)) : null, $data) : null;

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationField', $this->fields)) {
            $data['aggregationField'] = $this->fields['aggregationField'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('bookedFrom', $this->fields)) {
            $data['bookedFrom'] = $this->fields['bookedFrom'];
        }
        if (array_key_exists('bookedTo', $this->fields)) {
            $data['bookedTo'] = $this->fields['bookedTo'];
        }
        if (array_key_exists('recognizedAt', $this->fields)) {
            $data['recognizedAt'] = $this->fields['recognizedAt'];
        }
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'];
        }

        return $data;
    }
}
