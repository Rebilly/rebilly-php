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

use DateTimeImmutable;
use JsonSerializable;

class ReportDeferredRevenue implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('asOfDate', $data)) {
            $this->setAsOfDate($data['asOfDate']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('booked', $data)) {
            $this->setBooked($data['booked']);
        }
        if (array_key_exists('recognized', $data)) {
            $this->setRecognized($data['recognized']);
        }
        if (array_key_exists('liability', $data)) {
            $this->setLiability($data['liability']);
        }
        if (array_key_exists('months', $data)) {
            $this->setMonths($data['months']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAsOfDate(): ?DateTimeImmutable
    {
        return $this->fields['asOfDate'] ?? null;
    }

    public function setAsOfDate(null|DateTimeImmutable|string $asOfDate): static
    {
        if ($asOfDate !== null && !($asOfDate instanceof DateTimeImmutable)) {
            $asOfDate = new DateTimeImmutable($asOfDate);
        }

        $this->fields['asOfDate'] = $asOfDate;

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

    public function getBooked(): ?float
    {
        return $this->fields['booked'] ?? null;
    }

    public function setBooked(null|float|string $booked): static
    {
        if (is_string($booked)) {
            $booked = (float) $booked;
        }

        $this->fields['booked'] = $booked;

        return $this;
    }

    public function getRecognized(): ?float
    {
        return $this->fields['recognized'] ?? null;
    }

    public function setRecognized(null|float|string $recognized): static
    {
        if (is_string($recognized)) {
            $recognized = (float) $recognized;
        }

        $this->fields['recognized'] = $recognized;

        return $this;
    }

    public function getLiability(): ?float
    {
        return $this->fields['liability'] ?? null;
    }

    public function setLiability(null|float|string $liability): static
    {
        if (is_string($liability)) {
            $liability = (float) $liability;
        }

        $this->fields['liability'] = $liability;

        return $this;
    }

    /**
     * @return null|ReportDeferredRevenueMonths[]
     */
    public function getMonths(): ?array
    {
        return $this->fields['months'] ?? null;
    }

    /**
     * @param null|array[]|ReportDeferredRevenueMonths[] $months
     */
    public function setMonths(null|array $months): static
    {
        $months = $months !== null ? array_map(
            fn ($value) => $value instanceof ReportDeferredRevenueMonths ? $value : ReportDeferredRevenueMonths::from($value),
            $months,
        ) : null;

        $this->fields['months'] = $months;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('asOfDate', $this->fields)) {
            $data['asOfDate'] = $this->fields['asOfDate']?->format('Y-m-d');
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('booked', $this->fields)) {
            $data['booked'] = $this->fields['booked'];
        }
        if (array_key_exists('recognized', $this->fields)) {
            $data['recognized'] = $this->fields['recognized'];
        }
        if (array_key_exists('liability', $this->fields)) {
            $data['liability'] = $this->fields['liability'];
        }
        if (array_key_exists('months', $this->fields)) {
            $data['months'] = $this->fields['months'] !== null
                ? array_map(
                    static fn (ReportDeferredRevenueMonths $reportDeferredRevenueMonths) => $reportDeferredRevenueMonths->jsonSerialize(),
                    $this->fields['months'],
                )
                : null;
        }

        return $data;
    }
}
