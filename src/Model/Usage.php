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

class Usage implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('subscriptionId', $data)) {
            $this->setSubscriptionId($data['subscriptionId']);
        }
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('invoiceId', $data)) {
            $this->setInvoiceId($data['invoiceId']);
        }
        if (array_key_exists('invoiceItemId', $data)) {
            $this->setInvoiceItemId($data['invoiceItemId']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('usageTime', $data)) {
            $this->setUsageTime($data['usageTime']);
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

    public function getSubscriptionId(): string
    {
        return $this->fields['subscriptionId'];
    }

    public function setSubscriptionId(string $subscriptionId): self
    {
        $this->fields['subscriptionId'] = $subscriptionId;

        return $this;
    }

    public function getPlanId(): string
    {
        return $this->fields['planId'];
    }

    public function setPlanId(string $planId): self
    {
        $this->fields['planId'] = $planId;

        return $this;
    }

    public function getInvoiceId(): ?string
    {
        return $this->fields['invoiceId'] ?? null;
    }

    public function getInvoiceItemId(): ?string
    {
        return $this->fields['invoiceItemId'] ?? null;
    }

    public function getQuantity(): float
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(float|string $quantity): self
    {
        if (is_string($quantity)) {
            $quantity = (float) $quantity;
        }

        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getUsageTime(): ?DateTimeImmutable
    {
        return $this->fields['usageTime'] ?? null;
    }

    public function setUsageTime(null|DateTimeImmutable|string $usageTime): self
    {
        if ($usageTime !== null && !($usageTime instanceof DateTimeImmutable)) {
            $usageTime = new DateTimeImmutable($usageTime);
        }

        $this->fields['usageTime'] = $usageTime;

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
        if (array_key_exists('subscriptionId', $this->fields)) {
            $data['subscriptionId'] = $this->fields['subscriptionId'];
        }
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('invoiceId', $this->fields)) {
            $data['invoiceId'] = $this->fields['invoiceId'];
        }
        if (array_key_exists('invoiceItemId', $this->fields)) {
            $data['invoiceItemId'] = $this->fields['invoiceItemId'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('usageTime', $this->fields)) {
            $data['usageTime'] = $this->fields['usageTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setInvoiceId(null|string $invoiceId): self
    {
        $this->fields['invoiceId'] = $invoiceId;

        return $this;
    }

    private function setInvoiceItemId(null|string $invoiceItemId): self
    {
        $this->fields['invoiceItemId'] = $invoiceItemId;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
