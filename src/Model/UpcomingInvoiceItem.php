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

class UpcomingInvoiceItem implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('isInterim', $data)) {
            $this->setIsInterim($data['isInterim']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('unitPrice', $data)) {
            $this->setUnitPrice($data['unitPrice']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('subscriptionId', $data)) {
            $this->setSubscriptionId($data['subscriptionId']);
        }
        if (array_key_exists('discountAmount', $data)) {
            $this->setDiscountAmount($data['discountAmount']);
        }
        if (array_key_exists('periodStartTime', $data)) {
            $this->setPeriodStartTime($data['periodStartTime']);
        }
        if (array_key_exists('periodEndTime', $data)) {
            $this->setPeriodEndTime($data['periodEndTime']);
        }
        if (array_key_exists('periodNumber', $data)) {
            $this->setPeriodNumber($data['periodNumber']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('tax', $data)) {
            $this->setTax($data['tax']);
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

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getIsInterim(): ?bool
    {
        return $this->fields['isInterim'] ?? null;
    }

    public function setIsInterim(null|bool $isInterim): static
    {
        $this->fields['isInterim'] = $isInterim;

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

    public function getUnitPrice(): ?float
    {
        return $this->fields['unitPrice'] ?? null;
    }

    public function setUnitPrice(null|float|string $unitPrice): static
    {
        if (is_string($unitPrice)) {
            $unitPrice = (float) $unitPrice;
        }

        $this->fields['unitPrice'] = $unitPrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->fields['quantity'] ?? null;
    }

    public function setQuantity(null|int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->fields['price'] ?? null;
    }

    public function setPrice(null|float|string $price): static
    {
        if (is_string($price)) {
            $price = (float) $price;
        }

        $this->fields['price'] = $price;

        return $this;
    }

    public function getProductId(): ?string
    {
        return $this->fields['productId'] ?? null;
    }

    public function setProductId(null|string $productId): static
    {
        $this->fields['productId'] = $productId;

        return $this;
    }

    public function getPlanId(): ?string
    {
        return $this->fields['planId'] ?? null;
    }

    public function setPlanId(null|string $planId): static
    {
        $this->fields['planId'] = $planId;

        return $this;
    }

    public function getSubscriptionId(): ?string
    {
        return $this->fields['subscriptionId'] ?? null;
    }

    public function setSubscriptionId(null|string $subscriptionId): static
    {
        $this->fields['subscriptionId'] = $subscriptionId;

        return $this;
    }

    public function getDiscountAmount(): ?float
    {
        return $this->fields['discountAmount'] ?? null;
    }

    public function setDiscountAmount(null|float|string $discountAmount): static
    {
        if (is_string($discountAmount)) {
            $discountAmount = (float) $discountAmount;
        }

        $this->fields['discountAmount'] = $discountAmount;

        return $this;
    }

    public function getPeriodStartTime(): ?DateTimeImmutable
    {
        return $this->fields['periodStartTime'] ?? null;
    }

    public function setPeriodStartTime(null|DateTimeImmutable|string $periodStartTime): static
    {
        if ($periodStartTime !== null && !($periodStartTime instanceof DateTimeImmutable)) {
            $periodStartTime = new DateTimeImmutable($periodStartTime);
        }

        $this->fields['periodStartTime'] = $periodStartTime;

        return $this;
    }

    public function getPeriodEndTime(): ?DateTimeImmutable
    {
        return $this->fields['periodEndTime'] ?? null;
    }

    public function setPeriodEndTime(null|DateTimeImmutable|string $periodEndTime): static
    {
        if ($periodEndTime !== null && !($periodEndTime instanceof DateTimeImmutable)) {
            $periodEndTime = new DateTimeImmutable($periodEndTime);
        }

        $this->fields['periodEndTime'] = $periodEndTime;

        return $this;
    }

    public function getPeriodNumber(): ?int
    {
        return $this->fields['periodNumber'] ?? null;
    }

    public function setPeriodNumber(null|int $periodNumber): static
    {
        $this->fields['periodNumber'] = $periodNumber;

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

    public function getTax(): ?InvoiceTaxItem
    {
        return $this->fields['tax'] ?? null;
    }

    public function setTax(null|InvoiceTaxItem|array $tax): static
    {
        if ($tax !== null && !($tax instanceof InvoiceTaxItem)) {
            $tax = InvoiceTaxItem::from($tax);
        }

        $this->fields['tax'] = $tax;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    public function getEmbedded(): ?UpcomingInvoiceItemEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|UpcomingInvoiceItemEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof UpcomingInvoiceItemEmbedded)) {
            $embedded = UpcomingInvoiceItemEmbedded::from($embedded);
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
        if (array_key_exists('isInterim', $this->fields)) {
            $data['isInterim'] = $this->fields['isInterim'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('unitPrice', $this->fields)) {
            $data['unitPrice'] = $this->fields['unitPrice'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('subscriptionId', $this->fields)) {
            $data['subscriptionId'] = $this->fields['subscriptionId'];
        }
        if (array_key_exists('discountAmount', $this->fields)) {
            $data['discountAmount'] = $this->fields['discountAmount'];
        }
        if (array_key_exists('periodStartTime', $this->fields)) {
            $data['periodStartTime'] = $this->fields['periodStartTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodEndTime', $this->fields)) {
            $data['periodEndTime'] = $this->fields['periodEndTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('periodNumber', $this->fields)) {
            $data['periodNumber'] = $this->fields['periodNumber'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('tax', $this->fields)) {
            $data['tax'] = $this->fields['tax']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
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
}
