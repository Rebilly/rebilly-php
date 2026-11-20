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

use Rebilly\Sdk\Trait\HasMetadata;

class AddPayoutRequestBatchOperationByFilter implements AddPayoutRequestBatchOperation
{
    use HasMetadata;

    public const TYPE_ADD = 'add';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('batchId', $data)) {
            $this->setBatchId($data['batchId']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
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

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getBatchId(): string
    {
        return $this->fields['batchId'];
    }

    public function setBatchId(string $batchId): static
    {
        $this->fields['batchId'] = $batchId;

        return $this;
    }

    public function getFilter(): string
    {
        return $this->fields['filter'];
    }

    public function setFilter(string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('batchId', $this->fields)) {
            $data['batchId'] = $this->fields['batchId'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }

        return $data;
    }
}
