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

class InvoiceDiscounts implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('couponId', $data)) {
            $this->setCouponId($data['couponId']);
        }
        if (array_key_exists('redemptionId', $data)) {
            $this->setRedemptionId($data['redemptionId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('context', $data)) {
            $this->setContext($data['context']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCouponId(): ?string
    {
        return $this->fields['couponId'] ?? null;
    }

    public function setCouponId(null|string $couponId): static
    {
        $this->fields['couponId'] = $couponId;

        return $this;
    }

    public function getRedemptionId(): ?string
    {
        return $this->fields['redemptionId'] ?? null;
    }

    public function setRedemptionId(null|string $redemptionId): static
    {
        $this->fields['redemptionId'] = $redemptionId;

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

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getContext(): ?string
    {
        return $this->fields['context'] ?? null;
    }

    public function setContext(null|string $context): static
    {
        $this->fields['context'] = $context;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('couponId', $this->fields)) {
            $data['couponId'] = $this->fields['couponId'];
        }
        if (array_key_exists('redemptionId', $this->fields)) {
            $data['redemptionId'] = $this->fields['redemptionId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('context', $this->fields)) {
            $data['context'] = $this->fields['context'];
        }

        return $data;
    }
}
