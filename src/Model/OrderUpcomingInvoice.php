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

class OrderUpcomingInvoice implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
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
        if (array_key_exists('discounts', $data)) {
            $this->setDiscounts($data['discounts']);
        }
        if (array_key_exists('issuedTime', $data)) {
            $this->setIssuedTime($data['issuedTime']);
        }
        if (array_key_exists('dueTime', $data)) {
            $this->setDueTime($data['dueTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
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

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @return null|OrderUpcomingInvoiceItem[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|array[]|OrderUpcomingInvoiceItem[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value instanceof OrderUpcomingInvoiceItem ? $value : OrderUpcomingInvoiceItem::from($value),
            $items,
        ) : null;

        $this->fields['items'] = $items;

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

    /**
     * @return null|OrderUpcomingInvoiceDiscounts[]
     */
    public function getDiscounts(): ?array
    {
        return $this->fields['discounts'] ?? null;
    }

    public function getIssuedTime(): ?DateTimeImmutable
    {
        return $this->fields['issuedTime'] ?? null;
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

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'] !== null
                ? array_map(
                    static fn (OrderUpcomingInvoiceItem $orderUpcomingInvoiceItem) => $orderUpcomingInvoiceItem->jsonSerialize(),
                    $this->fields['items'],
                )
                : null;
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
        if (array_key_exists('discounts', $this->fields)) {
            $data['discounts'] = $this->fields['discounts'] !== null
                ? array_map(
                    static fn (OrderUpcomingInvoiceDiscounts $orderUpcomingInvoiceDiscounts) => $orderUpcomingInvoiceDiscounts->jsonSerialize(),
                    $this->fields['discounts'],
                )
                : null;
        }
        if (array_key_exists('issuedTime', $this->fields)) {
            $data['issuedTime'] = $this->fields['issuedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('dueTime', $this->fields)) {
            $data['dueTime'] = $this->fields['dueTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

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
     * @param null|array[]|OrderUpcomingInvoiceDiscounts[] $discounts
     */
    private function setDiscounts(null|array $discounts): static
    {
        $discounts = $discounts !== null ? array_map(
            fn ($value) => $value instanceof OrderUpcomingInvoiceDiscounts ? $value : OrderUpcomingInvoiceDiscounts::from($value),
            $discounts,
        ) : null;

        $this->fields['discounts'] = $discounts;

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
