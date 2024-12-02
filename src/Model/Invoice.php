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

class Invoice implements JsonSerializable
{
    public const STATUS_DRAFT = 'draft';

    public const STATUS_QUOTATION = 'quotation';

    public const STATUS_UNPAID = 'unpaid';

    public const STATUS_PAID = 'paid';

    public const STATUS_PARTIALLY_PAID = 'partially-paid';

    public const STATUS_PAST_DUE = 'past-due';

    public const STATUS_ABANDONED = 'abandoned';

    public const STATUS_VOIDED = 'voided';

    public const STATUS_PARTIALLY_REFUNDED = 'partially-refunded';

    public const STATUS_REFUNDED = 'refunded';

    public const STATUS_DISPUTED = 'disputed';

    public const TYPE_INITIAL = 'initial';

    public const TYPE_RENEWAL = 'renewal';

    public const TYPE_INTERIM = 'interim';

    public const TYPE_CANCELLATION = 'cancellation';

    public const TYPE_ONE_TIME = 'one-time';

    public const TYPE_REFUND = 'refund';

    public const TYPE_CHARGE = 'charge';

    public const TYPE_ONE_TIME_SALE = 'one-time-sale';

    private array $fields = [];

    public function __construct(array $data = [])
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
        if (array_key_exists('orderId', $data)) {
            $this->setOrderId($data['orderId']);
        }
        if (array_key_exists('subscriptionId', $data)) {
            $this->setSubscriptionId($data['subscriptionId']);
        }
        if (array_key_exists('quoteId', $data)) {
            $this->setQuoteId($data['quoteId']);
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
        if (array_key_exists('organizationTaxIdNumber', $data)) {
            $this->setOrganizationTaxIdNumber($data['organizationTaxIdNumber']);
        }
        if (array_key_exists('customerTaxIdNumber', $data)) {
            $this->setCustomerTaxIdNumber($data['customerTaxIdNumber']);
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
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('transactions', $data)) {
            $this->setTransactions($data['transactions']);
        }
        if (array_key_exists('retryInstruction', $data)) {
            $this->setRetryInstruction($data['retryInstruction']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('dueReminderTime', $data)) {
            $this->setDueReminderTime($data['dueReminderTime']);
        }
        if (array_key_exists('dueReminderNumber', $data)) {
            $this->setDueReminderNumber($data['dueReminderNumber']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('delinquencyTime', $data)) {
            $this->setDelinquencyTime($data['delinquencyTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->fields['invoiceNumber'] ?? null;
    }

    public function getOrderId(): ?string
    {
        return $this->fields['orderId'] ?? null;
    }

    public function getSubscriptionId(): ?string
    {
        return $this->fields['subscriptionId'] ?? null;
    }

    public function getQuoteId(): ?string
    {
        return $this->fields['quoteId'] ?? null;
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

    public function setShipping(null|Shipping|array $shipping): static
    {
        if ($shipping !== null && !($shipping instanceof Shipping)) {
            $shipping = ShippingFactory::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function getTax(): ?Taxes
    {
        return $this->fields['tax'] ?? null;
    }

    public function setTax(null|Taxes|array $tax): static
    {
        if ($tax !== null && !($tax instanceof Taxes)) {
            $tax = TaxesFactory::from($tax);
        }

        $this->fields['tax'] = $tax;

        return $this;
    }

    public function getOrganizationTaxIdNumber(): ?InvoiceOrganizationTaxIdNumber
    {
        return $this->fields['organizationTaxIdNumber'] ?? null;
    }

    public function setOrganizationTaxIdNumber(null|InvoiceOrganizationTaxIdNumber|array $organizationTaxIdNumber): static
    {
        if ($organizationTaxIdNumber !== null && !($organizationTaxIdNumber instanceof InvoiceOrganizationTaxIdNumber)) {
            $organizationTaxIdNumber = InvoiceOrganizationTaxIdNumber::from($organizationTaxIdNumber);
        }

        $this->fields['organizationTaxIdNumber'] = $organizationTaxIdNumber;

        return $this;
    }

    public function getCustomerTaxIdNumber(): ?InvoiceCustomerTaxIdNumber
    {
        return $this->fields['customerTaxIdNumber'] ?? null;
    }

    public function setCustomerTaxIdNumber(null|InvoiceCustomerTaxIdNumber|array $customerTaxIdNumber): static
    {
        if ($customerTaxIdNumber !== null && !($customerTaxIdNumber instanceof InvoiceCustomerTaxIdNumber)) {
            $customerTaxIdNumber = InvoiceCustomerTaxIdNumber::from($customerTaxIdNumber);
        }

        $this->fields['customerTaxIdNumber'] = $customerTaxIdNumber;

        return $this;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): static
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

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): static
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

    public function setPoNumber(null|string $poNumber): static
    {
        $this->fields['poNumber'] = $poNumber;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->fields['notes'] ?? null;
    }

    public function setNotes(null|string $notes): static
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
     * @return null|InvoiceDiscounts[]
     */
    public function getDiscounts(): ?array
    {
        return $this->fields['discounts'] ?? null;
    }

    public function getAutopayScheduledTime(): ?DateTimeImmutable
    {
        return $this->fields['autopayScheduledTime'] ?? null;
    }

    public function setAutopayScheduledTime(null|DateTimeImmutable|string $autopayScheduledTime): static
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

    public function getVoidedTime(): ?DateTimeImmutable
    {
        return $this->fields['voidedTime'] ?? null;
    }

    public function getPaidTime(): ?DateTimeImmutable
    {
        return $this->fields['paidTime'] ?? null;
    }

    public function getDueTime(): ?DateTimeImmutable
    {
        return $this->fields['dueTime'] ?? null;
    }

    public function setDueTime(null|DateTimeImmutable|string $dueTime): static
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

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @return null|Transaction[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    public function getRetryInstruction(): ?InvoiceRetryInstruction
    {
        return $this->fields['retryInstruction'] ?? null;
    }

    public function setRetryInstruction(null|InvoiceRetryInstruction|array $retryInstruction): static
    {
        if ($retryInstruction !== null && !($retryInstruction instanceof InvoiceRetryInstruction)) {
            $retryInstruction = InvoiceRetryInstruction::from($retryInstruction);
        }

        $this->fields['retryInstruction'] = $retryInstruction;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getDueReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['dueReminderTime'] ?? null;
    }

    public function getDueReminderNumber(): ?int
    {
        return $this->fields['dueReminderNumber'] ?? null;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    public function getDelinquencyTime(): ?DateTimeImmutable
    {
        return $this->fields['delinquencyTime'] ?? null;
    }

    public function setDelinquencyTime(null|DateTimeImmutable|string $delinquencyTime): static
    {
        if ($delinquencyTime !== null && !($delinquencyTime instanceof DateTimeImmutable)) {
            $delinquencyTime = new DateTimeImmutable($delinquencyTime);
        }

        $this->fields['delinquencyTime'] = $delinquencyTime;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?InvoiceEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|InvoiceEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof InvoiceEmbedded)) {
            $embedded = InvoiceEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
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
        if (array_key_exists('orderId', $this->fields)) {
            $data['orderId'] = $this->fields['orderId'];
        }
        if (array_key_exists('subscriptionId', $this->fields)) {
            $data['subscriptionId'] = $this->fields['subscriptionId'];
        }
        if (array_key_exists('quoteId', $this->fields)) {
            $data['quoteId'] = $this->fields['quoteId'];
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
        if (array_key_exists('organizationTaxIdNumber', $this->fields)) {
            $data['organizationTaxIdNumber'] = $this->fields['organizationTaxIdNumber']?->jsonSerialize();
        }
        if (array_key_exists('customerTaxIdNumber', $this->fields)) {
            $data['customerTaxIdNumber'] = $this->fields['customerTaxIdNumber']?->jsonSerialize();
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
            $data['items'] = $this->fields['items'] !== null
                ? array_map(
                    static fn (InvoiceItem $invoiceItem) => $invoiceItem->jsonSerialize(),
                    $this->fields['items'],
                )
                : null;
        }
        if (array_key_exists('discounts', $this->fields)) {
            $data['discounts'] = $this->fields['discounts'] !== null
                ? array_map(
                    static fn (InvoiceDiscounts $invoiceDiscounts) => $invoiceDiscounts->jsonSerialize(),
                    $this->fields['discounts'],
                )
                : null;
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
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'] !== null
                ? array_map(
                    static fn (Transaction $transaction) => $transaction->jsonSerialize(),
                    $this->fields['transactions'],
                )
                : null;
        }
        if (array_key_exists('retryInstruction', $this->fields)) {
            $data['retryInstruction'] = $this->fields['retryInstruction']?->jsonSerialize();
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('dueReminderTime', $this->fields)) {
            $data['dueReminderTime'] = $this->fields['dueReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('dueReminderNumber', $this->fields)) {
            $data['dueReminderNumber'] = $this->fields['dueReminderNumber'];
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('delinquencyTime', $this->fields)) {
            $data['delinquencyTime'] = $this->fields['delinquencyTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setInvoiceNumber(null|int $invoiceNumber): static
    {
        $this->fields['invoiceNumber'] = $invoiceNumber;

        return $this;
    }

    private function setOrderId(null|string $orderId): static
    {
        $this->fields['orderId'] = $orderId;

        return $this;
    }

    private function setSubscriptionId(null|string $subscriptionId): static
    {
        $this->fields['subscriptionId'] = $subscriptionId;

        return $this;
    }

    private function setQuoteId(null|string $quoteId): static
    {
        $this->fields['quoteId'] = $quoteId;

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

    private function setAmountDue(null|float|string $amountDue): static
    {
        if (is_string($amountDue)) {
            $amountDue = (float) $amountDue;
        }

        $this->fields['amountDue'] = $amountDue;

        return $this;
    }

    private function setSubtotalAmount(null|float|string $subtotalAmount): static
    {
        if (is_string($subtotalAmount)) {
            $subtotalAmount = (float) $subtotalAmount;
        }

        $this->fields['subtotalAmount'] = $subtotalAmount;

        return $this;
    }

    private function setDiscountAmount(null|float|string $discountAmount): static
    {
        if (is_string($discountAmount)) {
            $discountAmount = (float) $discountAmount;
        }

        $this->fields['discountAmount'] = $discountAmount;

        return $this;
    }

    /**
     * @param null|array[]|InvoiceItem[] $items
     */
    private function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value instanceof InvoiceItem ? $value : InvoiceItem::from($value),
            $items,
        ) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    /**
     * @param null|array[]|InvoiceDiscounts[] $discounts
     */
    private function setDiscounts(null|array $discounts): static
    {
        $discounts = $discounts !== null ? array_map(
            fn ($value) => $value instanceof InvoiceDiscounts ? $value : InvoiceDiscounts::from($value),
            $discounts,
        ) : null;

        $this->fields['discounts'] = $discounts;

        return $this;
    }

    private function setAutopayRetryNumber(null|int $autopayRetryNumber): static
    {
        $this->fields['autopayRetryNumber'] = $autopayRetryNumber;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setDelinquentCollectionPeriod(null|int $delinquentCollectionPeriod): static
    {
        $this->fields['delinquentCollectionPeriod'] = $delinquentCollectionPeriod;

        return $this;
    }

    private function setCollectionPeriod(null|int $collectionPeriod): static
    {
        $this->fields['collectionPeriod'] = $collectionPeriod;

        return $this;
    }

    private function setAbandonedTime(null|DateTimeImmutable|string $abandonedTime): static
    {
        if ($abandonedTime !== null && !($abandonedTime instanceof DateTimeImmutable)) {
            $abandonedTime = new DateTimeImmutable($abandonedTime);
        }

        $this->fields['abandonedTime'] = $abandonedTime;

        return $this;
    }

    private function setVoidedTime(null|DateTimeImmutable|string $voidedTime): static
    {
        if ($voidedTime !== null && !($voidedTime instanceof DateTimeImmutable)) {
            $voidedTime = new DateTimeImmutable($voidedTime);
        }

        $this->fields['voidedTime'] = $voidedTime;

        return $this;
    }

    private function setPaidTime(null|DateTimeImmutable|string $paidTime): static
    {
        if ($paidTime !== null && !($paidTime instanceof DateTimeImmutable)) {
            $paidTime = new DateTimeImmutable($paidTime);
        }

        $this->fields['paidTime'] = $paidTime;

        return $this;
    }

    private function setIssuedTime(null|DateTimeImmutable|string $issuedTime): static
    {
        if ($issuedTime !== null && !($issuedTime instanceof DateTimeImmutable)) {
            $issuedTime = new DateTimeImmutable($issuedTime);
        }

        $this->fields['issuedTime'] = $issuedTime;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setPaymentFormUrl(null|string $paymentFormUrl): static
    {
        $this->fields['paymentFormUrl'] = $paymentFormUrl;

        return $this;
    }

    /**
     * @param null|array[]|Transaction[] $transactions
     */
    private function setTransactions(null|array $transactions): static
    {
        $transactions = $transactions !== null ? array_map(
            fn ($value) => $value instanceof Transaction ? $value : Transaction::from($value),
            $transactions,
        ) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setDueReminderTime(null|DateTimeImmutable|string $dueReminderTime): static
    {
        if ($dueReminderTime !== null && !($dueReminderTime instanceof DateTimeImmutable)) {
            $dueReminderTime = new DateTimeImmutable($dueReminderTime);
        }

        $this->fields['dueReminderTime'] = $dueReminderTime;

        return $this;
    }

    private function setDueReminderNumber(null|int $dueReminderNumber): static
    {
        $this->fields['dueReminderNumber'] = $dueReminderNumber;

        return $this;
    }

    private function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
