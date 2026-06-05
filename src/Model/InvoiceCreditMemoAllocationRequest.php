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
use Rebilly\Sdk\Trait\HasMetadata;

class InvoiceCreditMemoAllocationRequest implements JsonSerializable
{
    use HasMetadata;

    public const ALLOCATION_ORDER_OLDEST_FIRST = 'oldest-first';

    public const ALLOCATION_ORDER_NEWEST_FIRST = 'newest-first';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('allocationOrder', $data)) {
            $this->setAllocationOrder($data['allocationOrder']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getAllocationOrder(): ?string
    {
        return $this->fields['allocationOrder'] ?? null;
    }

    public function setAllocationOrder(null|string $allocationOrder): static
    {
        $this->fields['allocationOrder'] = $allocationOrder;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('allocationOrder', $this->fields)) {
            $data['allocationOrder'] = $this->fields['allocationOrder'];
        }

        return $data;
    }
}
