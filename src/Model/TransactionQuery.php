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

class TransactionQuery implements JsonSerializable
{
    public const RESULT_ABANDONED = 'abandoned';

    public const RESULT_APPROVED = 'approved';

    public const RESULT_CANCELED = 'canceled';

    public const RESULT_DECLINED = 'declined';

    public const RESULT_UNKNOWN = 'unknown';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_CONN_ERROR = 'conn-error';

    public const STATUS_DISPUTED = 'disputed';

    public const STATUS_NEVER_SENT = 'never-sent';

    public const STATUS_OFFSITE = 'offsite';

    public const STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const STATUS_PENDING = 'pending';

    public const STATUS_REFUNDED = 'refunded';

    public const STATUS_SENDING = 'sending';

    public const STATUS_SUSPENDED = 'suspended';

    public const STATUS_TIMEOUT = 'timeout';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_WAITING_APPROVAL = 'waiting-approval';

    public const STATUS_WAITING_CAPTURE = 'waiting-capture';

    public const STATUS_WAITING_GATEWAY = 'waiting-gateway';

    public const STATUS_WAITING_REFUND = 'waiting-refund';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
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

    public function getResult(): ?string
    {
        return $this->fields['result'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }

        return $data;
    }

    private function setResult(null|string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    private function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }
}
