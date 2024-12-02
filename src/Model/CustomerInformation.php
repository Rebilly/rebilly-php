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

class CustomerInformation implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('refundsAmount', $data)) {
            $this->setRefundsAmount($data['refundsAmount']);
        }
        if (array_key_exists('revenueAmount', $data)) {
            $this->setRevenueAmount($data['revenueAmount']);
        }
        if (array_key_exists('disputesAmount', $data)) {
            $this->setDisputesAmount($data['disputesAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function getRefundsAmount(): ?float
    {
        return $this->fields['refundsAmount'] ?? null;
    }

    public function getRevenueAmount(): ?float
    {
        return $this->fields['revenueAmount'] ?? null;
    }

    public function getDisputesAmount(): ?float
    {
        return $this->fields['disputesAmount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('refundsAmount', $this->fields)) {
            $data['refundsAmount'] = $this->fields['refundsAmount'];
        }
        if (array_key_exists('revenueAmount', $this->fields)) {
            $data['revenueAmount'] = $this->fields['revenueAmount'];
        }
        if (array_key_exists('disputesAmount', $this->fields)) {
            $data['disputesAmount'] = $this->fields['disputesAmount'];
        }

        return $data;
    }

    private function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setRefundsAmount(null|float|string $refundsAmount): static
    {
        if (is_string($refundsAmount)) {
            $refundsAmount = (float) $refundsAmount;
        }

        $this->fields['refundsAmount'] = $refundsAmount;

        return $this;
    }

    private function setRevenueAmount(null|float|string $revenueAmount): static
    {
        if (is_string($revenueAmount)) {
            $revenueAmount = (float) $revenueAmount;
        }

        $this->fields['revenueAmount'] = $revenueAmount;

        return $this;
    }

    private function setDisputesAmount(null|float|string $disputesAmount): static
    {
        if (is_string($disputesAmount)) {
            $disputesAmount = (float) $disputesAmount;
        }

        $this->fields['disputesAmount'] = $disputesAmount;

        return $this;
    }
}
