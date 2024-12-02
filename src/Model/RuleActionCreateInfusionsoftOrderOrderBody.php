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

class RuleActionCreateInfusionsoftOrderOrderBody implements JsonSerializable
{
    public const ORDER_TYPE_OFFLINE = 'Offline';

    public const ORDER_TYPE_ONLINE = 'Online';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('order_date', $data)) {
            $this->setOrderDate($data['order_date']);
        }
        if (array_key_exists('order_title', $data)) {
            $this->setOrderTitle($data['order_title']);
        }
        if (array_key_exists('order_type', $data)) {
            $this->setOrderType($data['order_type']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOrderDate(): string
    {
        return $this->fields['order_date'];
    }

    public function setOrderDate(string $orderDate): static
    {
        $this->fields['order_date'] = $orderDate;

        return $this;
    }

    public function getOrderTitle(): string
    {
        return $this->fields['order_title'];
    }

    public function setOrderTitle(string $orderTitle): static
    {
        $this->fields['order_title'] = $orderTitle;

        return $this;
    }

    public function getOrderType(): string
    {
        return $this->fields['order_type'];
    }

    public function setOrderType(string $orderType): static
    {
        $this->fields['order_type'] = $orderType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('order_date', $this->fields)) {
            $data['order_date'] = $this->fields['order_date'];
        }
        if (array_key_exists('order_title', $this->fields)) {
            $data['order_title'] = $this->fields['order_title'];
        }
        if (array_key_exists('order_type', $this->fields)) {
            $data['order_type'] = $this->fields['order_type'];
        }

        return $data;
    }
}
