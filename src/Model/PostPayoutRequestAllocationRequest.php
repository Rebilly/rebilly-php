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

class PostPayoutRequestAllocationRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('payoutRequestId', $data)) {
            $this->setPayoutRequestId($data['payoutRequestId']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('gatewayAccountId', $data)) {
            $this->setGatewayAccountId($data['gatewayAccountId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPayoutRequestId(): string
    {
        return $this->fields['payoutRequestId'];
    }

    public function setPayoutRequestId(string $payoutRequestId): static
    {
        $this->fields['payoutRequestId'] = $payoutRequestId;

        return $this;
    }

    public function getPaymentInstrumentId(): string
    {
        return $this->fields['paymentInstrumentId'];
    }

    public function setPaymentInstrumentId(string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function getGatewayAccountId(): string
    {
        return $this->fields['gatewayAccountId'];
    }

    public function setGatewayAccountId(string $gatewayAccountId): static
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

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
        if (array_key_exists('payoutRequestId', $this->fields)) {
            $data['payoutRequestId'] = $this->fields['payoutRequestId'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('gatewayAccountId', $this->fields)) {
            $data['gatewayAccountId'] = $this->fields['gatewayAccountId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }

        return $data;
    }
}
