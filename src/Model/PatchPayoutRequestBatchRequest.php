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

class PatchPayoutRequestBatchRequest implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
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

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getAllocationOrder(): ?array
    {
        return $this->fields['allocationOrder'] ?? null;
    }

    /**
     * @param null|string[] $allocationOrder
     */
    public function setAllocationOrder(null|array $allocationOrder): static
    {
        $this->fields['allocationOrder'] = $allocationOrder;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('allocationOrder', $this->fields)) {
            $data['allocationOrder'] = $this->fields['allocationOrder'];
        }

        return $data;
    }
}
