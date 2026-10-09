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

class PayoutRequestAllocationOperation implements JsonSerializable
{
    use HasMetadata;

    public const TYPE_PROCESS = 'process';

    public const STATUS_COMPLETED = 'completed';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('allocationIds', $data)) {
            $this->setAllocationIds($data['allocationIds']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @return string[]
     */
    public function getAllocationIds(): array
    {
        return $this->fields['allocationIds'];
    }

    public function getStatus(): string
    {
        return $this->fields['status'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('allocationIds', $this->fields)) {
            $data['allocationIds'] = $this->fields['allocationIds'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }

        return $data;
    }

    private function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @param string[] $allocationIds
     */
    private function setAllocationIds(array $allocationIds): static
    {
        $this->fields['allocationIds'] = $allocationIds;

        return $this;
    }

    private function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }
}
