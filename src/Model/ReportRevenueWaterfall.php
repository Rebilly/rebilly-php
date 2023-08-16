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

class ReportRevenueWaterfall implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('issuedMonth', $data)) {
            $this->setIssuedMonth($data['issuedMonth']);
        }
        if (array_key_exists('booked', $data)) {
            $this->setBooked($data['booked']);
        }
        if (array_key_exists('recognized', $data)) {
            $this->setRecognized($data['recognized']);
        }
        if (array_key_exists('remaining', $data)) {
            $this->setRemaining($data['remaining']);
        }
        if (array_key_exists('waterfall', $data)) {
            $this->setWaterfall($data['waterfall']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getIssuedMonth(): ?string
    {
        return $this->fields['issuedMonth'] ?? null;
    }

    public function setIssuedMonth(null|string $issuedMonth): static
    {
        $this->fields['issuedMonth'] = $issuedMonth;

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

    public function getRemaining(): ?float
    {
        return $this->fields['remaining'] ?? null;
    }

    public function setRemaining(null|float|string $remaining): static
    {
        if (is_string($remaining)) {
            $remaining = (float) $remaining;
        }

        $this->fields['remaining'] = $remaining;

        return $this;
    }

    /**
     * @return null|object[]
     */
    public function getWaterfall(): ?array
    {
        return $this->fields['waterfall'] ?? null;
    }

    /**
     * @param null|object[] $waterfall
     */
    public function setWaterfall(null|array $waterfall): static
    {
        $waterfall = $waterfall !== null ? array_map(fn ($value) => $value ?? null, $waterfall) : null;

        $this->fields['waterfall'] = $waterfall;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('issuedMonth', $this->fields)) {
            $data['issuedMonth'] = $this->fields['issuedMonth'];
        }
        if (array_key_exists('booked', $this->fields)) {
            $data['booked'] = $this->fields['booked'];
        }
        if (array_key_exists('recognized', $this->fields)) {
            $data['recognized'] = $this->fields['recognized'];
        }
        if (array_key_exists('remaining', $this->fields)) {
            $data['remaining'] = $this->fields['remaining'];
        }
        if (array_key_exists('waterfall', $this->fields)) {
            $data['waterfall'] = $this->fields['waterfall'];
        }

        return $data;
    }
}
