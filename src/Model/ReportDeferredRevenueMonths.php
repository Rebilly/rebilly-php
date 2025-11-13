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

class ReportDeferredRevenueMonths implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('month', $data)) {
            $this->setMonth($data['month']);
        }
        if (array_key_exists('bookedAsOfMonth', $data)) {
            $this->setBookedAsOfMonth($data['bookedAsOfMonth']);
        }
        if (array_key_exists('bookedInMonth', $data)) {
            $this->setBookedInMonth($data['bookedInMonth']);
        }
        if (array_key_exists('recognizeAsOfMonth', $data)) {
            $this->setRecognizeAsOfMonth($data['recognizeAsOfMonth']);
        }
        if (array_key_exists('recognizeInMonth', $data)) {
            $this->setRecognizeInMonth($data['recognizeInMonth']);
        }
        if (array_key_exists('liabilityAsOfMonth', $data)) {
            $this->setLiabilityAsOfMonth($data['liabilityAsOfMonth']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMonth(): ?string
    {
        return $this->fields['month'] ?? null;
    }

    public function setMonth(null|string $month): static
    {
        $this->fields['month'] = $month;

        return $this;
    }

    public function getBookedAsOfMonth(): ?float
    {
        return $this->fields['bookedAsOfMonth'] ?? null;
    }

    public function setBookedAsOfMonth(null|float|string $bookedAsOfMonth): static
    {
        if (is_string($bookedAsOfMonth)) {
            $bookedAsOfMonth = (float) $bookedAsOfMonth;
        }

        $this->fields['bookedAsOfMonth'] = $bookedAsOfMonth;

        return $this;
    }

    public function getBookedInMonth(): ?float
    {
        return $this->fields['bookedInMonth'] ?? null;
    }

    public function setBookedInMonth(null|float|string $bookedInMonth): static
    {
        if (is_string($bookedInMonth)) {
            $bookedInMonth = (float) $bookedInMonth;
        }

        $this->fields['bookedInMonth'] = $bookedInMonth;

        return $this;
    }

    public function getRecognizeAsOfMonth(): ?float
    {
        return $this->fields['recognizeAsOfMonth'] ?? null;
    }

    public function setRecognizeAsOfMonth(null|float|string $recognizeAsOfMonth): static
    {
        if (is_string($recognizeAsOfMonth)) {
            $recognizeAsOfMonth = (float) $recognizeAsOfMonth;
        }

        $this->fields['recognizeAsOfMonth'] = $recognizeAsOfMonth;

        return $this;
    }

    public function getRecognizeInMonth(): ?float
    {
        return $this->fields['recognizeInMonth'] ?? null;
    }

    public function setRecognizeInMonth(null|float|string $recognizeInMonth): static
    {
        if (is_string($recognizeInMonth)) {
            $recognizeInMonth = (float) $recognizeInMonth;
        }

        $this->fields['recognizeInMonth'] = $recognizeInMonth;

        return $this;
    }

    public function getLiabilityAsOfMonth(): ?float
    {
        return $this->fields['liabilityAsOfMonth'] ?? null;
    }

    public function setLiabilityAsOfMonth(null|float|string $liabilityAsOfMonth): static
    {
        if (is_string($liabilityAsOfMonth)) {
            $liabilityAsOfMonth = (float) $liabilityAsOfMonth;
        }

        $this->fields['liabilityAsOfMonth'] = $liabilityAsOfMonth;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('month', $this->fields)) {
            $data['month'] = $this->fields['month'];
        }
        if (array_key_exists('bookedAsOfMonth', $this->fields)) {
            $data['bookedAsOfMonth'] = $this->fields['bookedAsOfMonth'];
        }
        if (array_key_exists('bookedInMonth', $this->fields)) {
            $data['bookedInMonth'] = $this->fields['bookedInMonth'];
        }
        if (array_key_exists('recognizeAsOfMonth', $this->fields)) {
            $data['recognizeAsOfMonth'] = $this->fields['recognizeAsOfMonth'];
        }
        if (array_key_exists('recognizeInMonth', $this->fields)) {
            $data['recognizeInMonth'] = $this->fields['recognizeInMonth'];
        }
        if (array_key_exists('liabilityAsOfMonth', $this->fields)) {
            $data['liabilityAsOfMonth'] = $this->fields['liabilityAsOfMonth'];
        }

        return $data;
    }
}
