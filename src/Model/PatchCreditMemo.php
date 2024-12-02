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

class PatchCreditMemo implements JsonSerializable
{
    public const REASON_RETURN = 'return';

    public const REASON_PRODUCT_UNSATISFACTORY = 'product-unsatisfactory';

    public const REASON_ORDER_CHANGE = 'order-change';

    public const REASON_ORDER_CANCELLATION = 'order-cancellation';

    public const REASON_CHARGEBACK = 'chargeback';

    public const REASON_WRITE_OFF = 'write-off';

    public const REASON_WAIVER = 'waiver';

    public const REASON_CUSTOMER_CREDIT = 'customer-credit';

    public const REASON_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('allocations', $data)) {
            $this->setAllocations($data['allocations']);
        }
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAllocations(): ?PatchCreditMemoAllocations
    {
        return $this->fields['allocations'] ?? null;
    }

    public function setAllocations(null|PatchCreditMemoAllocations|array $allocations): static
    {
        if ($allocations !== null && !($allocations instanceof PatchCreditMemoAllocations)) {
            $allocations = PatchCreditMemoAllocations::from($allocations);
        }

        $this->fields['allocations'] = $allocations;

        return $this;
    }

    /**
     * @return null|PatchCreditMemoItems[]
     */
    public function getItems(): ?array
    {
        return $this->fields['items'] ?? null;
    }

    /**
     * @param null|array[]|PatchCreditMemoItems[] $items
     */
    public function setItems(null|array $items): static
    {
        $items = $items !== null ? array_map(
            fn ($value) => $value instanceof PatchCreditMemoItems ? $value : PatchCreditMemoItems::from($value),
            $items,
        ) : null;

        $this->fields['items'] = $items;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->fields['reason'] ?? null;
    }

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('allocations', $this->fields)) {
            $data['allocations'] = $this->fields['allocations']?->jsonSerialize();
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = $this->fields['items'] !== null
                ? array_map(
                    static fn (PatchCreditMemoItems $patchCreditMemoItems) => $patchCreditMemoItems->jsonSerialize(),
                    $this->fields['items'],
                )
                : null;
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

        return $data;
    }
}
