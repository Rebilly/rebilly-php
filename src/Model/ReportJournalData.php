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

class ReportJournalData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('aggregationValue', $data)) {
            $this->setAggregationValue($data['aggregationValue']);
        }
        if (array_key_exists('bookedMonth', $data)) {
            $this->setBookedMonth($data['bookedMonth']);
        }
        if (array_key_exists('bookedAmount', $data)) {
            $this->setBookedAmount($data['bookedAmount']);
        }
        if (array_key_exists('recognizedAmount', $data)) {
            $this->setRecognizedAmount($data['recognizedAmount']);
        }
        if (array_key_exists('remainingAmount', $data)) {
            $this->setRemainingAmount($data['remainingAmount']);
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

    public function getBookedMonth(): ?string
    {
        return $this->fields['bookedMonth'] ?? null;
    }

    public function setBookedMonth(null|string $bookedMonth): static
    {
        $this->fields['bookedMonth'] = $bookedMonth;

        return $this;
    }

    public function getBookedAmount(): ?float
    {
        return $this->fields['bookedAmount'] ?? null;
    }

    public function setBookedAmount(null|float|string $bookedAmount): static
    {
        if (is_string($bookedAmount)) {
            $bookedAmount = (float) $bookedAmount;
        }

        $this->fields['bookedAmount'] = $bookedAmount;

        return $this;
    }

    public function getRecognizedAmount(): ?float
    {
        return $this->fields['recognizedAmount'] ?? null;
    }

    public function setRecognizedAmount(null|float|string $recognizedAmount): static
    {
        if (is_string($recognizedAmount)) {
            $recognizedAmount = (float) $recognizedAmount;
        }

        $this->fields['recognizedAmount'] = $recognizedAmount;

        return $this;
    }

    public function getRemainingAmount(): ?float
    {
        return $this->fields['remainingAmount'] ?? null;
    }

    public function setRemainingAmount(null|float|string $remainingAmount): static
    {
        if (is_string($remainingAmount)) {
            $remainingAmount = (float) $remainingAmount;
        }

        $this->fields['remainingAmount'] = $remainingAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('aggregationValue', $this->fields)) {
            $data['aggregationValue'] = $this->fields['aggregationValue'];
        }
        if (array_key_exists('bookedMonth', $this->fields)) {
            $data['bookedMonth'] = $this->fields['bookedMonth'];
        }
        if (array_key_exists('bookedAmount', $this->fields)) {
            $data['bookedAmount'] = $this->fields['bookedAmount'];
        }
        if (array_key_exists('recognizedAmount', $this->fields)) {
            $data['recognizedAmount'] = $this->fields['recognizedAmount'];
        }
        if (array_key_exists('remainingAmount', $this->fields)) {
            $data['remainingAmount'] = $this->fields['remainingAmount'];
        }

        return $data;
    }
}
