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

class CommonOrderPreviewDiscounts implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('couponId', $data)) {
            $this->setCouponId($data['couponId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
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

    public function setCouponId(null|string $couponId): self
    {
        $this->fields['couponId'] = $couponId;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float $amount): self
    {
        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): self
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('couponId', $this->fields)) {
            $data['couponId'] = $this->fields['couponId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }

        return $data;
    }
}
