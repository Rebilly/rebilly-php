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

class GetPayoutRequestPaymentInstruments200Response implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('exposureAmount', $data)) {
            $this->setExposureAmount($data['exposureAmount']);
        }
        if (array_key_exists('previousAllocatedAmount', $data)) {
            $this->setPreviousAllocatedAmount($data['previousAllocatedAmount']);
        }
        if (array_key_exists('lastPaymentTime', $data)) {
            $this->setLastPaymentTime($data['lastPaymentTime']);
        }
        if (array_key_exists('lastPayoutTime', $data)) {
            $this->setLastPayoutTime($data['lastPayoutTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPaymentInstrumentId(): ?string
    {
        return $this->fields['paymentInstrumentId'] ?? null;
    }

    public function setPaymentInstrumentId(null|string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function getGatewayName(): ?string
    {
        return $this->fields['gatewayName'] ?? null;
    }

    public function setGatewayName(null|string $gatewayName): static
    {
        $this->fields['gatewayName'] = $gatewayName;

        return $this;
    }

    public function getExposureAmount(): ?float
    {
        return $this->fields['exposureAmount'] ?? null;
    }

    public function setExposureAmount(null|float|string $exposureAmount): static
    {
        if (is_string($exposureAmount)) {
            $exposureAmount = (float) $exposureAmount;
        }

        $this->fields['exposureAmount'] = $exposureAmount;

        return $this;
    }

    public function getPreviousAllocatedAmount(): ?float
    {
        return $this->fields['previousAllocatedAmount'] ?? null;
    }

    public function setPreviousAllocatedAmount(null|float|string $previousAllocatedAmount): static
    {
        if (is_string($previousAllocatedAmount)) {
            $previousAllocatedAmount = (float) $previousAllocatedAmount;
        }

        $this->fields['previousAllocatedAmount'] = $previousAllocatedAmount;

        return $this;
    }

    public function getLastPaymentTime(): ?DateTimeImmutable
    {
        return $this->fields['lastPaymentTime'] ?? null;
    }

    public function setLastPaymentTime(null|DateTimeImmutable|string $lastPaymentTime): static
    {
        if ($lastPaymentTime !== null && !($lastPaymentTime instanceof DateTimeImmutable)) {
            $lastPaymentTime = new DateTimeImmutable($lastPaymentTime);
        }

        $this->fields['lastPaymentTime'] = $lastPaymentTime;

        return $this;
    }

    public function getLastPayoutTime(): ?DateTimeImmutable
    {
        return $this->fields['lastPayoutTime'] ?? null;
    }

    public function setLastPayoutTime(null|DateTimeImmutable|string $lastPayoutTime): static
    {
        if ($lastPayoutTime !== null && !($lastPayoutTime instanceof DateTimeImmutable)) {
            $lastPayoutTime = new DateTimeImmutable($lastPayoutTime);
        }

        $this->fields['lastPayoutTime'] = $lastPayoutTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('exposureAmount', $this->fields)) {
            $data['exposureAmount'] = $this->fields['exposureAmount'];
        }
        if (array_key_exists('previousAllocatedAmount', $this->fields)) {
            $data['previousAllocatedAmount'] = $this->fields['previousAllocatedAmount'];
        }
        if (array_key_exists('lastPaymentTime', $this->fields)) {
            $data['lastPaymentTime'] = $this->fields['lastPaymentTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('lastPayoutTime', $this->fields)) {
            $data['lastPayoutTime'] = $this->fields['lastPayoutTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
