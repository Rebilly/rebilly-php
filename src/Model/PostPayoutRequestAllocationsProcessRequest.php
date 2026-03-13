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

class PostPayoutRequestAllocationsProcessRequest implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('allocationIds', $data)) {
            $this->setAllocationIds($data['allocationIds']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return string[]
     */
    public function getAllocationIds(): array
    {
        return $this->fields['allocationIds'];
    }

    /**
     * @param string[] $allocationIds
     */
    public function setAllocationIds(array $allocationIds): static
    {
        $this->fields['allocationIds'] = $allocationIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('allocationIds', $this->fields)) {
            $data['allocationIds'] = $this->fields['allocationIds'];
        }

        return $data;
    }
}
