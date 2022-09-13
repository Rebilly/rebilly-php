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

class RevenueEntry implements JsonSerializable
{
    public const STATUS_SCHEDULED = 'scheduled';

    public const STATUS_RECOGNIZED = 'recognized';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('invoiceId', $data)) {
            $this->setInvoiceId($data['invoiceId']);
        }
        if (array_key_exists('invoiceItemId', $data)) {
            $this->setInvoiceItemId($data['invoiceItemId']);
        }
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('accountingCode', $data)) {
            $this->setAccountingCode($data['accountingCode']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('estimatedAmount', $data)) {
            $this->setEstimatedAmount($data['estimatedAmount']);
        }
        if (array_key_exists('recognizedAmount', $data)) {
            $this->setRecognizedAmount($data['recognizedAmount']);
        }
        if (array_key_exists('scheduledTime', $data)) {
            $this->setScheduledTime($data['scheduledTime']);
        }
        if (array_key_exists('issuedTime', $data)) {
            $this->setIssuedTime($data['issuedTime']);
        }
        if (array_key_exists('recognizedTime', $data)) {
            $this->setRecognizedTime($data['recognizedTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getInvoiceId(): ?string
    {
        return $this->fields['invoiceId'] ?? null;
    }

    public function setInvoiceId(null|string $invoiceId): self
    {
        $this->fields['invoiceId'] = $invoiceId;

        return $this;
    }

    public function getInvoiceItemId(): ?string
    {
        return $this->fields['invoiceItemId'] ?? null;
    }

    public function setInvoiceItemId(null|string $invoiceItemId): self
    {
        $this->fields['invoiceItemId'] = $invoiceItemId;

        return $this;
    }

    public function getProductId(): ?string
    {
        return $this->fields['productId'] ?? null;
    }

    public function setProductId(null|string $productId): self
    {
        $this->fields['productId'] = $productId;

        return $this;
    }

    public function getPlanId(): ?string
    {
        return $this->fields['planId'] ?? null;
    }

    public function setPlanId(null|string $planId): self
    {
        $this->fields['planId'] = $planId;

        return $this;
    }

    public function getAccountingCode(): ?string
    {
        return $this->fields['accountingCode'] ?? null;
    }

    public function setAccountingCode(null|string $accountingCode): self
    {
        $this->fields['accountingCode'] = $accountingCode;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getEstimatedAmount(): ?float
    {
        return $this->fields['estimatedAmount'] ?? null;
    }

    public function setEstimatedAmount(null|float|string $estimatedAmount): self
    {
        if (is_string($estimatedAmount)) {
            $estimatedAmount = (float) $estimatedAmount;
        }

        $this->fields['estimatedAmount'] = $estimatedAmount;

        return $this;
    }

    public function getRecognizedAmount(): ?float
    {
        return $this->fields['recognizedAmount'] ?? null;
    }

    public function setRecognizedAmount(null|float|string $recognizedAmount): self
    {
        if (is_string($recognizedAmount)) {
            $recognizedAmount = (float) $recognizedAmount;
        }

        $this->fields['recognizedAmount'] = $recognizedAmount;

        return $this;
    }

    public function getScheduledTime(): ?DateTimeImmutable
    {
        return $this->fields['scheduledTime'] ?? null;
    }

    public function setScheduledTime(null|DateTimeImmutable|string $scheduledTime): self
    {
        if ($scheduledTime !== null && !($scheduledTime instanceof DateTimeImmutable)) {
            $scheduledTime = new DateTimeImmutable($scheduledTime);
        }

        $this->fields['scheduledTime'] = $scheduledTime;

        return $this;
    }

    public function getIssuedTime(): ?DateTimeImmutable
    {
        return $this->fields['issuedTime'] ?? null;
    }

    public function setIssuedTime(null|DateTimeImmutable|string $issuedTime): self
    {
        if ($issuedTime !== null && !($issuedTime instanceof DateTimeImmutable)) {
            $issuedTime = new DateTimeImmutable($issuedTime);
        }

        $this->fields['issuedTime'] = $issuedTime;

        return $this;
    }

    public function getRecognizedTime(): ?DateTimeImmutable
    {
        return $this->fields['recognizedTime'] ?? null;
    }

    public function setRecognizedTime(null|DateTimeImmutable|string $recognizedTime): self
    {
        if ($recognizedTime !== null && !($recognizedTime instanceof DateTimeImmutable)) {
            $recognizedTime = new DateTimeImmutable($recognizedTime);
        }

        $this->fields['recognizedTime'] = $recognizedTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('invoiceId', $this->fields)) {
            $data['invoiceId'] = $this->fields['invoiceId'];
        }
        if (array_key_exists('invoiceItemId', $this->fields)) {
            $data['invoiceItemId'] = $this->fields['invoiceItemId'];
        }
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('accountingCode', $this->fields)) {
            $data['accountingCode'] = $this->fields['accountingCode'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('estimatedAmount', $this->fields)) {
            $data['estimatedAmount'] = $this->fields['estimatedAmount'];
        }
        if (array_key_exists('recognizedAmount', $this->fields)) {
            $data['recognizedAmount'] = $this->fields['recognizedAmount'];
        }
        if (array_key_exists('scheduledTime', $this->fields)) {
            $data['scheduledTime'] = $this->fields['scheduledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('issuedTime', $this->fields)) {
            $data['issuedTime'] = $this->fields['issuedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('recognizedTime', $this->fields)) {
            $data['recognizedTime'] = $this->fields['recognizedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }
}
