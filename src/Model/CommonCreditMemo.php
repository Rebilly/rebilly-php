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

abstract class CommonCreditMemo implements JsonSerializable
{
    public const STATUS_ISSUED = 'issued';

    public const STATUS_APPLIED = 'applied';

    public const STATUS_PARTIALLY_APPLIED = 'partially-applied';

    public const STATUS_VOIDED = 'voided';

    public const REASON__RETURN = 'return';

    public const REASON_PRODUCT_UNSATISFACTORY = 'product-unsatisfactory';

    public const REASON_ORDER_CHANGE = 'order-change';

    public const REASON_ORDER_CANCELLATION = 'order-cancellation';

    public const REASON_CHARGEBACK = 'chargeback';

    public const REASON_WRITE_OFF = 'write-off';

    public const REASON_WAIVER = 'waiver';

    public const REASON_CUSTOMER_CREDIT = 'customer-credit';

    public const REASON_OTHER = 'other';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('number', $data)) {
            $this->setNumber($data['number']);
        }
        if (array_key_exists('allocations', $data)) {
            $this->setAllocations($data['allocations']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('reason', $data)) {
            $this->setReason($data['reason']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('shippingAmount', $data)) {
            $this->setShippingAmount($data['shippingAmount']);
        }
        if (array_key_exists('taxAmount', $data)) {
            $this->setTaxAmount($data['taxAmount']);
        }
        if (array_key_exists('totalAmount', $data)) {
            $this->setTotalAmount($data['totalAmount']);
        }
        if (array_key_exists('unusedAmount', $data)) {
            $this->setUnusedAmount($data['unusedAmount']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getNumber(): ?int
    {
        return $this->fields['number'] ?? null;
    }

    public function getAllocations(): ?CommonCreditMemoAllocations
    {
        return $this->fields['allocations'] ?? null;
    }

    public function setAllocations(null|CommonCreditMemoAllocations|array $allocations): static
    {
        if ($allocations !== null && !($allocations instanceof CommonCreditMemoAllocations)) {
            $allocations = CommonCreditMemoAllocations::from($allocations);
        }

        $this->fields['allocations'] = $allocations;

        return $this;
    }

    /**
     * @return null|CommonCreditMemoItems[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|CommonCreditMemoItems[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CommonCreditMemoItems ? $value : CommonCreditMemoItems::from($value)) : null, $items) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @psalm-return self::REASON_*|null $reason
     */
    public function getReason(): ?string
    {
        return $this->fields['reason'] ?? null;
    }

    /**
     * @psalm-param self::REASON_*|null $reason
     */
    public function setReason(null|string $reason): static
    {
        $this->fields['reason'] = $reason;

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

    public function getShippingAmount(): ?float
    {
        return $this->fields['shippingAmount'] ?? null;
    }

    public function setShippingAmount(null|float|string $shippingAmount): static
    {
        if (is_string($shippingAmount)) {
            $shippingAmount = (float) $shippingAmount;
        }

        $this->fields['shippingAmount'] = $shippingAmount;

        return $this;
    }

    public function getTaxAmount(): ?float
    {
        return $this->fields['taxAmount'] ?? null;
    }

    public function setTaxAmount(null|float|string $taxAmount): static
    {
        if (is_string($taxAmount)) {
            $taxAmount = (float) $taxAmount;
        }

        $this->fields['taxAmount'] = $taxAmount;

        return $this;
    }

    public function getTotalAmount(): ?float
    {
        return $this->fields['totalAmount'] ?? null;
    }

    public function getUnusedAmount(): ?float
    {
        return $this->fields['unusedAmount'] ?? null;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
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
     * @return null|array<CustomerLink|InvoiceLink|SelfLink>
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
        if (array_key_exists('number', $this->fields)) {
            $data['number'] = $this->fields['number'];
        }
        if (array_key_exists('allocations', $this->fields)) {
            $data['allocations'] = $this->fields['allocations']?->jsonSerialize();
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('reason', $this->fields)) {
            $data['reason'] = $this->fields['reason'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('shippingAmount', $this->fields)) {
            $data['shippingAmount'] = $this->fields['shippingAmount'];
        }
        if (array_key_exists('taxAmount', $this->fields)) {
            $data['taxAmount'] = $this->fields['taxAmount'];
        }
        if (array_key_exists('totalAmount', $this->fields)) {
            $data['totalAmount'] = $this->fields['totalAmount'];
        }
        if (array_key_exists('unusedAmount', $this->fields)) {
            $data['unusedAmount'] = $this->fields['unusedAmount'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setNumber(null|int $number): static
    {
        $this->fields['number'] = $number;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setTotalAmount(null|float|string $totalAmount): static
    {
        if (is_string($totalAmount)) {
            $totalAmount = (float) $totalAmount;
        }

        $this->fields['totalAmount'] = $totalAmount;

        return $this;
    }

    private function setUnusedAmount(null|float|string $unusedAmount): static
    {
        if (is_string($unusedAmount)) {
            $unusedAmount = (float) $unusedAmount;
        }

        $this->fields['unusedAmount'] = $unusedAmount;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

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
     * @param null|array<CustomerLink|InvoiceLink|SelfLink> $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
