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

abstract class CommonOrder implements JsonSerializable
{
    public const ORDER_TYPE_SUBSCRIPTION_ORDER = 'subscription-order';

    public const ORDER_TYPE_ONE_TIME_ORDER = 'one-time-order';

    public const BILLING_STATUS_DRAFT = 'draft';

    public const BILLING_STATUS_UNPAID = 'unpaid';

    public const BILLING_STATUS_PAST_DUE = 'past-due';

    public const BILLING_STATUS_ABANDONED = 'abandoned';

    public const BILLING_STATUS_PAID = 'paid';

    public const BILLING_STATUS_VOIDED = 'voided';

    public const BILLING_STATUS_REFUNDED = 'refunded';

    public const BILLING_STATUS_DISPUTED = 'disputed';

    public const BILLING_STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const BILLING_STATUS_PARTIALLY_PAID = 'partially-paid';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('orderType', $data)) {
            $this->setOrderType($data['orderType']);
        }
        if (array_key_exists('billingStatus', $data)) {
            $this->setBillingStatus($data['billingStatus']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('initialInvoiceId', $data)) {
            $this->setInitialInvoiceId($data['initialInvoiceId']);
        }
        if (array_key_exists('recentInvoiceId', $data)) {
            $this->setRecentInvoiceId($data['recentInvoiceId']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('deliveryAddress', $data)) {
            $this->setDeliveryAddress($data['deliveryAddress']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('activationTime', $data)) {
            $this->setActivationTime($data['activationTime']);
        }
        if (array_key_exists('voidTime', $data)) {
            $this->setVoidTime($data['voidTime']);
        }
        if (array_key_exists('couponIds', $data)) {
            $this->setCouponIds($data['couponIds']);
        }
        if (array_key_exists('poNumber', $data)) {
            $this->setPoNumber($data['poNumber']);
        }
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
        }
        if (array_key_exists('notes', $data)) {
            $this->setNotes($data['notes']);
        }
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    /**
     * @psalm-return self::ORDER_TYPE_*|null $orderType
     */
    public function getOrderType(): ?string
    {
        return $this->fields['orderType'] ?? null;
    }

    /**
     * @psalm-param self::ORDER_TYPE_*|null $orderType
     */
    public function setOrderType(null|string $orderType): self
    {
        $this->fields['orderType'] = $orderType;

        return $this;
    }

    /**
     * @psalm-return self::BILLING_STATUS_*|null $billingStatus
     */
    public function getBillingStatus(): ?string
    {
        return $this->fields['billingStatus'] ?? null;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function setWebsiteId(null|string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function getInitialInvoiceId(): ?string
    {
        return $this->fields['initialInvoiceId'] ?? null;
    }

    public function getRecentInvoiceId(): ?string
    {
        return $this->fields['recentInvoiceId'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\OrderItem[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\OrderItem[] $items
     */
    public function setItems(null|array $items): self
    {
        $items = $items !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\OrderItem ? $value : \Rebilly\Sdk\Model\OrderItem::from($value)) : null, $items) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    public function getDeliveryAddress(): ?ContactObject
    {
        return $this->fields['deliveryAddress'] ?? null;
    }

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): self
    {
        if ($deliveryAddress !== null && !($deliveryAddress instanceof ContactObject)) {
            $deliveryAddress = ContactObject::from($deliveryAddress);
        }

        $this->fields['deliveryAddress'] = $deliveryAddress;

        return $this;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): self
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getActivationTime(): ?DateTimeImmutable
    {
        return $this->fields['activationTime'] ?? null;
    }

    public function setActivationTime(null|DateTimeImmutable|string $activationTime): self
    {
        if ($activationTime !== null && !($activationTime instanceof DateTimeImmutable)) {
            $activationTime = new DateTimeImmutable($activationTime);
        }

        $this->fields['activationTime'] = $activationTime;

        return $this;
    }

    public function getVoidTime(): ?DateTimeImmutable
    {
        return $this->fields['voidTime'] ?? null;
    }

    public function setVoidTime(null|DateTimeImmutable|string $voidTime): self
    {
        if ($voidTime !== null && !($voidTime instanceof DateTimeImmutable)) {
            $voidTime = new DateTimeImmutable($voidTime);
        }

        $this->fields['voidTime'] = $voidTime;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getCouponIds(): ?array
    {
        return $this->fields['couponIds'] ?? null;
    }

    /**
     * @param null|string[] $couponIds
     */
    public function setCouponIds(null|array $couponIds): self
    {
        $couponIds = $couponIds !== null ? array_map(fn ($value) => $value ?? null, $couponIds) : null;

        $this->fields['couponIds'] = $couponIds;

        return $this;
    }

    public function getPoNumber(): ?string
    {
        return $this->fields['poNumber'] ?? null;
    }

    public function setPoNumber(null|string $poNumber): self
    {
        $this->fields['poNumber'] = $poNumber;

        return $this;
    }

    public function getShipping(): ?Shipping
    {
        return $this->fields['shipping'] ?? null;
    }

    public function setShipping(null|Shipping|array $shipping): self
    {
        if ($shipping !== null && !($shipping instanceof \Rebilly\Sdk\Model\Shipping)) {
            $shipping = \Rebilly\Sdk\Model\Shipping::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->fields['notes'] ?? null;
    }

    public function setNotes(null|string $notes): self
    {
        $this->fields['notes'] = $notes;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('orderType', $this->fields)) {
            $data['orderType'] = $this->fields['orderType'];
        }
        if (array_key_exists('billingStatus', $this->fields)) {
            $data['billingStatus'] = $this->fields['billingStatus'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('initialInvoiceId', $this->fields)) {
            $data['initialInvoiceId'] = $this->fields['initialInvoiceId'];
        }
        if (array_key_exists('recentInvoiceId', $this->fields)) {
            $data['recentInvoiceId'] = $this->fields['recentInvoiceId'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }
        if (array_key_exists('deliveryAddress', $this->fields)) {
            $data['deliveryAddress'] = $this->fields['deliveryAddress']?->jsonSerialize();
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('activationTime', $this->fields)) {
            $data['activationTime'] = $this->fields['activationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('voidTime', $this->fields)) {
            $data['voidTime'] = $this->fields['voidTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('couponIds', $this->fields)) {
            $data['couponIds'] = $this->fields['couponIds'];
        }
        if (array_key_exists('poNumber', $this->fields)) {
            $data['poNumber'] = $this->fields['poNumber'];
        }
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }
        if (array_key_exists('notes', $this->fields)) {
            $data['notes'] = $this->fields['notes'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::BILLING_STATUS_*|null $billingStatus
     */
    private function setBillingStatus(null|string $billingStatus): self
    {
        $this->fields['billingStatus'] = $billingStatus;

        return $this;
    }

    private function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setInitialInvoiceId(null|string $initialInvoiceId): self
    {
        $this->fields['initialInvoiceId'] = $initialInvoiceId;

        return $this;
    }

    private function setRecentInvoiceId(null|string $recentInvoiceId): self
    {
        $this->fields['recentInvoiceId'] = $recentInvoiceId;

        return $this;
    }
}
