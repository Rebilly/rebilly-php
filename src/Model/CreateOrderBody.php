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

class CreateOrderBody implements JsonSerializable
{
    public const ORDER_TYPE_OFFLINE = 'Offline';

    public const ORDER_TYPE_ONLINE = 'Online';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('orderDate', $data)) {
            $this->setOrderDate($data['orderDate']);
        }
        if (array_key_exists('orderTitle', $data)) {
            $this->setOrderTitle($data['orderTitle']);
        }
        if (array_key_exists('orderType', $data)) {
            $this->setOrderType($data['orderType']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOrderDate(): string
    {
        return $this->fields['orderDate'];
    }

    public function setOrderDate(string $orderDate): self
    {
        $this->fields['orderDate'] = $orderDate;

        return $this;
    }

    public function getOrderTitle(): string
    {
        return $this->fields['orderTitle'];
    }

    public function setOrderTitle(string $orderTitle): self
    {
        $this->fields['orderTitle'] = $orderTitle;

        return $this;
    }

    /**
     * @psalm-return self::ORDER_TYPE_* $orderType
     */
    public function getOrderType(): string
    {
        return $this->fields['orderType'];
    }

    /**
     * @psalm-param self::ORDER_TYPE_* $orderType
     */
    public function setOrderType(string $orderType): self
    {
        $this->fields['orderType'] = $orderType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('orderDate', $this->fields)) {
            $data['orderDate'] = $this->fields['orderDate'];
        }
        if (array_key_exists('orderTitle', $this->fields)) {
            $data['orderTitle'] = $this->fields['orderTitle'];
        }
        if (array_key_exists('orderType', $this->fields)) {
            $data['orderType'] = $this->fields['orderType'];
        }

        return $data;
    }
}
