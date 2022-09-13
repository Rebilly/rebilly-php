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

class TimeSeriesTransactionData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('subaggregates', $data)) {
            $this->setSubaggregates($data['subaggregates']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDate(): ?string
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|string $date): self
    {
        $this->fields['date'] = $date;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|float|string $total): self
    {
        if (is_string($total)) {
            $total = (float) $total;
        }

        $this->fields['total'] = $total;

        return $this;
    }

    public function getSubaggregates(): ?TimeSeriesTransactionSubaggregates
    {
        return $this->fields['subaggregates'] ?? null;
    }

    public function setSubaggregates(null|TimeSeriesTransactionSubaggregates|array $subaggregates): self
    {
        if ($subaggregates !== null && !($subaggregates instanceof TimeSeriesTransactionSubaggregates)) {
            $subaggregates = TimeSeriesTransactionSubaggregates::from($subaggregates);
        }

        $this->fields['subaggregates'] = $subaggregates;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date'];
        }
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('subaggregates', $this->fields)) {
            $data['subaggregates'] = $this->fields['subaggregates']?->jsonSerialize();
        }

        return $data;
    }
}
