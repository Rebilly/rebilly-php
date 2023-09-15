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

class FixedFeeFormula implements FeeFormula, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('minAmount', $data)) {
            $this->setMinAmount($data['minAmount']);
        }
        if (array_key_exists('bips', $data)) {
            $this->setBips($data['bips']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'fixed-fee';
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

    public function getBips(): float
    {
        return $this->fields['bips'];
    }

    public function setBips(float $bips): static
    {
        $this->fields['bips'] = $bips;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'fixed-fee',
        ];
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('minAmount', $this->fields)) {
            $data['minAmount'] = $this->fields['minAmount'];
        }
        if (array_key_exists('bips', $this->fields)) {
            $data['bips'] = $this->fields['bips'];
        }

        return $data;
    }
}
