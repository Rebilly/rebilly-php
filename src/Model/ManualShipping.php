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

class ManualShipping implements Shipping, JsonSerializable
{
    public const CALCULATOR_MANUAL = 'manual';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('calculator', $data)) {
            $this->setCalculator($data['calculator']);
        }
        if (array_key_exists('rateId', $data)) {
            $this->setRateId($data['rateId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAmount(): int
    {
        return $this->fields['amount'];
    }

    public function setAmount(int $amount): static
    {
        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCalculator(): string
    {
        return $this->fields['calculator'];
    }

    public function setCalculator(string $calculator): static
    {
        $this->fields['calculator'] = $calculator;

        return $this;
    }

    public function getRateId(): ?string
    {
        return $this->fields['rateId'] ?? null;
    }

    public function setRateId(null|string $rateId): static
    {
        $this->fields['rateId'] = $rateId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('calculator', $this->fields)) {
            $data['calculator'] = $this->fields['calculator'];
        }
        if (array_key_exists('rateId', $this->fields)) {
            $data['rateId'] = $this->fields['rateId'];
        }

        return $data;
    }
}
