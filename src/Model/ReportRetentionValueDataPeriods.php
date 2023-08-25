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

class ReportRetentionValueDataPeriods implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
        if (array_key_exists('retentionAverage', $data)) {
            $this->setRetentionAverage($data['retentionAverage']);
        }
        if (array_key_exists('transactionsCount', $data)) {
            $this->setTransactionsCount($data['transactionsCount']);
        }
        if (array_key_exists('transactionsValue', $data)) {
            $this->setTransactionsValue($data['transactionsValue']);
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

    public function getRetentionAverage(): ?float
    {
        return $this->fields['retentionAverage'] ?? null;
    }

    public function setRetentionAverage(null|float|string $retentionAverage): static
    {
        if (is_string($retentionAverage)) {
            $retentionAverage = (float) $retentionAverage;
        }

        $this->fields['retentionAverage'] = $retentionAverage;

        return $this;
    }

    public function getTransactionsCount(): ?int
    {
        return $this->fields['transactionsCount'] ?? null;
    }

    public function setTransactionsCount(null|int $transactionsCount): static
    {
        $this->fields['transactionsCount'] = $transactionsCount;

        return $this;
    }

    public function getTransactionsValue(): ?float
    {
        return $this->fields['transactionsValue'] ?? null;
    }

    public function setTransactionsValue(null|float|string $transactionsValue): static
    {
        if (is_string($transactionsValue)) {
            $transactionsValue = (float) $transactionsValue;
        }

        $this->fields['transactionsValue'] = $transactionsValue;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period'];
        }
        if (array_key_exists('retentionAverage', $this->fields)) {
            $data['retentionAverage'] = $this->fields['retentionAverage'];
        }
        if (array_key_exists('transactionsCount', $this->fields)) {
            $data['transactionsCount'] = $this->fields['transactionsCount'];
        }
        if (array_key_exists('transactionsValue', $this->fields)) {
            $data['transactionsValue'] = $this->fields['transactionsValue'];
        }

        return $data;
    }
}
