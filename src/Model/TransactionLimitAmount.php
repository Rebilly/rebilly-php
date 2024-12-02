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

class TransactionLimitAmount implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('resetTime', $data)) {
            $this->setResetTime($data['resetTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

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

    public function getResetTime(): ?DateTimeImmutable
    {
        return $this->fields['resetTime'] ?? null;
    }

    public function setResetTime(null|DateTimeImmutable|string $resetTime): static
    {
        if ($resetTime !== null && !($resetTime instanceof DateTimeImmutable)) {
            $resetTime = new DateTimeImmutable($resetTime);
        }

        $this->fields['resetTime'] = $resetTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('resetTime', $this->fields)) {
            $data['resetTime'] = $this->fields['resetTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
