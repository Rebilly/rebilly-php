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

class PercentageFormula implements FeeFormula, JsonSerializable
{
    public const TYPE_PERCENTAGE = 'percentage';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('bips', $data)) {
            $this->setBips($data['bips']);
        }
        if (array_key_exists('minAmount', $data)) {
            $this->setMinAmount($data['minAmount']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
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

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getBips(): float
    {
        return $this->fields['bips'];
    }

    public function setBips(float $bips): static
    {
        $this->fields['bips'] = $bips;

        return $this;
    }

    public function getMinAmount(): ?float
    {
        return $this->fields['minAmount'] ?? null;
    }

    public function setMinAmount(null|float|string $minAmount): static
    {
        if (is_string($minAmount)) {
            $minAmount = (float) $minAmount;
        }

        $this->fields['minAmount'] = $minAmount;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('bips', $this->fields)) {
            $data['bips'] = $this->fields['bips'];
        }
        if (array_key_exists('minAmount', $this->fields)) {
            $data['minAmount'] = $this->fields['minAmount'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }

        return $data;
    }
}
