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

class PayoutRequestAllocations implements JsonSerializable
{
    public const TRANSACTION_RESULT_ABANDONED = 'abandoned';

    public const TRANSACTION_RESULT_APPROVED = 'approved';

    public const TRANSACTION_RESULT_CANCELED = 'canceled';

    public const TRANSACTION_RESULT_DECLINED = 'declined';

    public const TRANSACTION_RESULT_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('transactionResult', $data)) {
            $this->setTransactionResult($data['transactionResult']);
        }
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('gatewayName', $data)) {
            $this->setGatewayName($data['gatewayName']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
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

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function setTransactionId(null|string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    public function getTransactionResult(): ?string
    {
        return $this->fields['transactionResult'] ?? null;
    }

    public function getMethod(): ?string
    {
        return $this->fields['method'] ?? null;
    }

    public function setMethod(null|string $method): static
    {
        $this->fields['method'] = $method;

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

    public function getPaymentInstrumentId(): ?string
    {
        return $this->fields['paymentInstrumentId'] ?? null;
    }

    public function setPaymentInstrumentId(null|string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
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
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('transactionResult', $this->fields)) {
            $data['transactionResult'] = $this->fields['transactionResult'];
        }
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('gatewayName', $this->fields)) {
            $data['gatewayName'] = $this->fields['gatewayName'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setTransactionResult(null|string $transactionResult): static
    {
        $this->fields['transactionResult'] = $transactionResult;

        return $this;
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
