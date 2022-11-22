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

abstract class CommonInvoice implements JsonSerializable
{
    public const STATUS_DRAFT = 'draft';

    public const STATUS_UNPAID = 'unpaid';

    public const STATUS_PAID = 'paid';

    public const STATUS_PARTIALLY_PAID = 'partially-paid';

    public const STATUS_PAST_DUE = 'past-due';

    public const STATUS_ABANDONED = 'abandoned';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const STATUS_REFUNDED = 'refunded';

    public const STATUS_DISPUTED = 'disputed';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('invoiceNumber', $data)) {
            $this->setInvoiceNumber($data['invoiceNumber']);
        }
        if (array_key_exists('subscriptionId', $data)) {
            $this->setSubscriptionId($data['subscriptionId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('amountDue', $data)) {
            $this->setAmountDue($data['amountDue']);
        }
        if (array_key_exists('subtotalAmount', $data)) {
            $this->setSubtotalAmount($data['subtotalAmount']);
        }
        if (array_key_exists('discountAmount', $data)) {
            $this->setDiscountAmount($data['discountAmount']);
        }
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
        }
        if (array_key_exists('tax', $data)) {
            $this->setTax($data['tax']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('deliveryAddress', $data)) {
            $this->setDeliveryAddress($data['deliveryAddress']);
        }
        if (array_key_exists('poNumber', $data)) {
            $this->setPoNumber($data['poNumber']);
        }
        if (array_key_exists('notes', $data)) {
            $this->setNotes($data['notes']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('discounts', $data)) {
            $this->setDiscounts($data['discounts']);
        }
        if (array_key_exists('autopayScheduledTime', $data)) {
            $this->setAutopayScheduledTime($data['autopayScheduledTime']);
        }
        if (array_key_exists('autopayRetryNumber', $data)) {
            $this->setAutopayRetryNumber($data['autopayRetryNumber']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('delinquentCollectionPeriod', $data)) {
            $this->setDelinquentCollectionPeriod($data['delinquentCollectionPeriod']);
        }
        if (array_key_exists('collectionPeriod', $data)) {
            $this->setCollectionPeriod($data['collectionPeriod']);
        }
        if (array_key_exists('abandonedTime', $data)) {
            $this->setAbandonedTime($data['abandonedTime']);
        }
        if (array_key_exists('voidedTime', $data)) {
            $this->setVoidedTime($data['voidedTime']);
        }
        if (array_key_exists('paidTime', $data)) {
            $this->setPaidTime($data['paidTime']);
        }
        if (array_key_exists('dueTime', $data)) {
            $this->setDueTime($data['dueTime']);
        }
        if (array_key_exists('issuedTime', $data)) {
            $this->setIssuedTime($data['issuedTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('paymentFormUrl', $data)) {
            $this->setPaymentFormUrl($data['paymentFormUrl']);
        }
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->fields['invoiceNumber'] ?? null;
    }

    public function getSubscriptionId(): ?string
    {
        return $this->fields['subscriptionId'] ?? null;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function getAmountDue(): ?float
    {
        return $this->fields['amountDue'] ?? null;
    }

    public function getSubtotalAmount(): ?float
    {
        return $this->fields['subtotalAmount'] ?? null;
    }

    public function getDiscountAmount(): ?float
    {
        return $this->fields['discountAmount'] ?? null;
    }

    public function getShipping(): ?Shipping
    {
        return $this->fields['shipping'] ?? null;
    }

    public function setShipping(null|Shipping|array $shipping): self
    {
        if ($shipping !== null && !($shipping instanceof Shipping)) {
            $shipping = Shipping::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function getTax(): ?InvoiceTax
    {
        return $this->fields['tax'] ?? null;
    }

    public function setTax(null|InvoiceTax|array $tax): self
    {
        if ($tax !== null && !($tax instanceof InvoiceTax)) {
            $tax = InvoiceTax::from($tax);
        }

        $this->fields['tax'] = $tax;

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

    public function getPoNumber(): ?string
    {
        return $this->fields['poNumber'] ?? null;
    }

    public function setPoNumber(null|string $poNumber): self
    {
        $this->fields['poNumber'] = $poNumber;

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

    /**
     * @return null|InvoiceItem[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @return null|InvoiceDiscount[]
     */
    public function getDiscounts(): ?array
    {
        return $this->fields['discounts'] ?? null;
    }

    public function getAutopayScheduledTime(): ?DateTimeImmutable
    {
        return $this->fields['autopayScheduledTime'] ?? null;
    }

    public function setAutopayScheduledTime(null|DateTimeImmutable|string $autopayScheduledTime): self
    {
        if ($autopayScheduledTime !== null && !($autopayScheduledTime instanceof DateTimeImmutable)) {
            $autopayScheduledTime = new DateTimeImmutable($autopayScheduledTime);
        }

        $this->fields['autopayScheduledTime'] = $autopayScheduledTime;

        return $this;
    }

    public function getAutopayRetryNumber(): ?int
    {
        return $this->fields['autopayRetryNumber'] ?? null;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getDelinquentCollectionPeriod(): ?int
    {
        return $this->fields['delinquentCollectionPeriod'] ?? null;
    }

    public function getCollectionPeriod(): ?int
    {
        return $this->fields['collectionPeriod'] ?? null;
    }

    public function getAbandonedTime(): ?DateTimeImmutable
    {
        return $this->fields['abandonedTime'] ?? null;
    }

    public function setAbandonedTime(null|DateTimeImmutable|string $abandonedTime): self
    {
        if ($abandonedTime !== null && !($abandonedTime instanceof DateTimeImmutable)) {
            $abandonedTime = new DateTimeImmutable($abandonedTime);
        }

        $this->fields['abandonedTime'] = $abandonedTime;

        return $this;
    }

    public function getVoidedTime(): ?DateTimeImmutable
    {
        return $this->fields['voidedTime'] ?? null;
    }

    public function setVoidedTime(null|DateTimeImmutable|string $voidedTime): self
    {
        if ($voidedTime !== null && !($voidedTime instanceof DateTimeImmutable)) {
            $voidedTime = new DateTimeImmutable($voidedTime);
        }

        $this->fields['voidedTime'] = $voidedTime;

        return $this;
    }

    public function getPaidTime(): ?DateTimeImmutable
    {
        return $this->fields['paidTime'] ?? null;
    }

    public function setPaidTime(null|DateTimeImmutable|string $paidTime): self
    {
        if ($paidTime !== null && !($paidTime instanceof DateTimeImmutable)) {
            $paidTime = new DateTimeImmutable($paidTime);
        }

        $this->fields['paidTime'] = $paidTime;

        return $this;
    }

    public function getDueTime(): ?DateTimeImmutable
    {
        return $this->fields['dueTime'] ?? null;
    }

    public function setDueTime(null|DateTimeImmutable|string $dueTime): self
    {
        if ($dueTime !== null && !($dueTime instanceof DateTimeImmutable)) {
            $dueTime = new DateTimeImmutable($dueTime);
        }

        $this->fields['dueTime'] = $dueTime;

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

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getPaymentFormUrl(): ?string
    {
        return $this->fields['paymentFormUrl'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('invoiceNumber', $this->fields)) {
            $data['invoiceNumber'] = $this->fields['invoiceNumber'];
        }
        if (array_key_exists('subscriptionId', $this->fields)) {
            $data['subscriptionId'] = $this->fields['subscriptionId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('amountDue', $this->fields)) {
            $data['amountDue'] = $this->fields['amountDue'];
        }
        if (array_key_exists('subtotalAmount', $this->fields)) {
            $data['subtotalAmount'] = $this->fields['subtotalAmount'];
        }
        if (array_key_exists('discountAmount', $this->fields)) {
            $data['discountAmount'] = $this->fields['discountAmount'];
        }
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }
        if (array_key_exists('tax', $this->fields)) {
            $data['tax'] = $this->fields['tax']?->jsonSerialize();
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('deliveryAddress', $this->fields)) {
            $data['deliveryAddress'] = $this->fields['deliveryAddress']?->jsonSerialize();
        }
        if (array_key_exists('poNumber', $this->fields)) {
            $data['poNumber'] = $this->fields['poNumber'];
        }
        if (array_key_exists('notes', $this->fields)) {
            $data['notes'] = $this->fields['notes'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }
        if (array_key_exists('discounts', $this->fields)) {
            $data['discounts'] = $this->fields['discounts'];
        }
        if (array_key_exists('autopayScheduledTime', $this->fields)) {
            $data['autopayScheduledTime'] = $this->fields['autopayScheduledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('autopayRetryNumber', $this->fields)) {
            $data['autopayRetryNumber'] = $this->fields['autopayRetryNumber'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('delinquentCollectionPeriod', $this->fields)) {
            $data['delinquentCollectionPeriod'] = $this->fields['delinquentCollectionPeriod'];
        }
        if (array_key_exists('collectionPeriod', $this->fields)) {
            $data['collectionPeriod'] = $this->fields['collectionPeriod'];
        }
        if (array_key_exists('abandonedTime', $this->fields)) {
            $data['abandonedTime'] = $this->fields['abandonedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('voidedTime', $this->fields)) {
            $data['voidedTime'] = $this->fields['voidedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('paidTime', $this->fields)) {
            $data['paidTime'] = $this->fields['paidTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('dueTime', $this->fields)) {
            $data['dueTime'] = $this->fields['dueTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('issuedTime', $this->fields)) {
            $data['issuedTime'] = $this->fields['issuedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('paymentFormUrl', $this->fields)) {
            $data['paymentFormUrl'] = $this->fields['paymentFormUrl'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setInvoiceNumber(null|int $invoiceNumber): self
    {
        $this->fields['invoiceNumber'] = $invoiceNumber;

        return $this;
    }

    private function setSubscriptionId(null|string $subscriptionId): self
    {
        $this->fields['subscriptionId'] = $subscriptionId;

        return $this;
    }

    private function setAmount(null|float|string $amount): self
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    private function setAmountDue(null|float|string $amountDue): self
    {
        if (is_string($amountDue)) {
            $amountDue = (float) $amountDue;
        }

        $this->fields['amountDue'] = $amountDue;

        return $this;
    }

    private function setSubtotalAmount(null|float|string $subtotalAmount): self
    {
        if (is_string($subtotalAmount)) {
            $subtotalAmount = (float) $subtotalAmount;
        }

        $this->fields['subtotalAmount'] = $subtotalAmount;

        return $this;
    }

    private function setDiscountAmount(null|float|string $discountAmount): self
    {
        if (is_string($discountAmount)) {
            $discountAmount = (float) $discountAmount;
        }

        $this->fields['discountAmount'] = $discountAmount;

        return $this;
    }

    /**
     * @param null|InvoiceItem[] $items
     */
    private function setItems(null|array $items): self
    {
        $items = $items !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof InvoiceItem ? $value : InvoiceItem::from($value)) : null, $items) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    /**
     * @param null|InvoiceDiscount[] $discounts
     */
    private function setDiscounts(null|array $discounts): self
    {
        $discounts = $discounts !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof InvoiceDiscount ? $value : InvoiceDiscount::from($value)) : null, $discounts) : null;

        $this->fields['discounts'] = $discounts;

        return $this;
    }

    private function setAutopayRetryNumber(null|int $autopayRetryNumber): self
    {
        $this->fields['autopayRetryNumber'] = $autopayRetryNumber;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setDelinquentCollectionPeriod(null|int $delinquentCollectionPeriod): self
    {
        $this->fields['delinquentCollectionPeriod'] = $delinquentCollectionPeriod;

        return $this;
    }

    private function setCollectionPeriod(null|int $collectionPeriod): self
    {
        $this->fields['collectionPeriod'] = $collectionPeriod;

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

    private function setPaymentFormUrl(null|string $paymentFormUrl): self
    {
        $this->fields['paymentFormUrl'] = $paymentFormUrl;

        return $this;
    }
}
