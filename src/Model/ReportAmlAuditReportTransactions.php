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
use Rebilly\Sdk\Trait\HasMetadata;

class ReportAmlAuditReportTransactions implements JsonSerializable
{
    use HasMetadata;

    public const TYPE_3_DS_AUTHENTICATION = '3ds-authentication';

    public const TYPE_AUTHORIZE = 'authorize';

    public const TYPE_CAPTURE = 'capture';

    public const TYPE_CREDIT = 'credit';

    public const TYPE_REFUND = 'refund';

    public const TYPE_SALE = 'sale';

    public const TYPE_SETUP = 'setup';

    public const TYPE_VOID = 'void';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_CONN_ERROR = 'conn-error';

    public const STATUS_DISPUTED = 'disputed';

    public const STATUS_NEVER_SENT = 'never-sent';

    public const STATUS_OFFSITE = 'offsite';

    public const STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const STATUS_PENDING = 'pending';

    public const STATUS_REFUNDED = 'refunded';

    public const STATUS_SENDING = 'sending';

    public const STATUS_TIMEOUT = 'timeout';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_WAITING_APPROVAL = 'waiting-approval';

    public const STATUS_WAITING_CAPTURE = 'waiting-capture';

    public const STATUS_WAITING_GATEWAY = 'waiting-gateway';

    public const STATUS_WAITING_REFUND = 'waiting-refund';

    public const RESULT_APPROVED = 'approved';

    public const RESULT_CANCELED = 'canceled';

    public const RESULT_DECLINED = 'declined';

    public const RESULT_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getId(): string
    {
        return $this->fields['id'];
    }

    public function setId(string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getCreatedTime(): DateTimeImmutable
    {
        return $this->fields['createdTime'];
    }

    public function getUpdatedTime(): DateTimeImmutable
    {
        return $this->fields['updatedTime'];
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

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function getStatus(): string
    {
        return $this->fields['status'];
    }

    public function getResult(): string
    {
        return $this->fields['result'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }

        return $data;
    }

    private function setCreatedTime(DateTimeImmutable|string $createdTime): static
    {
        if (!($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(DateTimeImmutable|string $updatedTime): static
    {
        if (!($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setResult(string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }
}
