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
use DateTimeInterface;
use JsonSerializable;

class SubscriptionCancellationLineItems implements JsonSerializable
{
    public const TYPE_DEBIT = 'debit';

    public const TYPE_CREDIT = 'credit';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('unitPriceAmount', $data)) {
            $this->setUnitPriceAmount($data['unitPriceAmount']);
        }
        if (array_key_exists('unitPriceCurrency', $data)) {
            $this->setUnitPriceCurrency($data['unitPriceCurrency']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('periodStartTime', $data)) {
            $this->setPeriodStartTime($data['periodStartTime']);
        }
        if (array_key_exists('periodEndTime', $data)) {
            $this->setPeriodEndTime($data['periodEndTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getUnitPriceAmount(): float
    {
        return $this->fields['unitPriceAmount'];
    }

    public function setUnitPriceAmount(float|string $unitPriceAmount): static
    {
        if (is_string($unitPriceAmount)) {
            $unitPriceAmount = (float) $unitPriceAmount;
        }

        $this->fields['unitPriceAmount'] = $unitPriceAmount;

        return $this;
    }

    public function getUnitPriceCurrency(): string
    {
        return $this->fields['unitPriceCurrency'];
    }

    public function setUnitPriceCurrency(string $unitPriceCurrency): static
    {
        $this->fields['unitPriceCurrency'] = $unitPriceCurrency;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getPeriodStartTime(): ?DateTimeImmutable
    {
        return $this->fields['periodStartTime'] ?? null;
    }

    public function setPeriodStartTime(null|DateTimeImmutable|string $periodStartTime): static
    {
        if ($periodStartTime !== null && !($periodStartTime instanceof DateTimeImmutable)) {
            $periodStartTime = new DateTimeImmutable($periodStartTime);
        }

        $this->fields['periodStartTime'] = $periodStartTime;

        return $this;
    }

    public function getPeriodEndTime(): ?DateTimeImmutable
    {
        return $this->fields['periodEndTime'] ?? null;
    }

    public function setPeriodEndTime(null|DateTimeImmutable|string $periodEndTime): static
    {
        if ($periodEndTime !== null && !($periodEndTime instanceof DateTimeImmutable)) {
            $periodEndTime = new DateTimeImmutable($periodEndTime);
        }

        $this->fields['periodEndTime'] = $periodEndTime;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('unitPriceAmount', $this->fields)) {
            $data['unitPriceAmount'] = $this->fields['unitPriceAmount'];
        }
        if (array_key_exists('unitPriceCurrency', $this->fields)) {
            $data['unitPriceCurrency'] = $this->fields['unitPriceCurrency'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('periodStartTime', $this->fields)) {
            $data['periodStartTime'] = $this->fields['periodStartTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodEndTime', $this->fields)) {
            $data['periodEndTime'] = $this->fields['periodEndTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
