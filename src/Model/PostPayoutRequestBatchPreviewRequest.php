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

class PostPayoutRequestBatchPreviewRequest implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('batchId', $data)) {
            $this->setBatchId($data['batchId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getBatchId(): ?string
    {
        return $this->fields['batchId'] ?? null;
    }

    public function setBatchId(null|string $batchId): static
    {
        $this->fields['batchId'] = $batchId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('batchId', $this->fields)) {
            $data['batchId'] = $this->fields['batchId'];
        }

        return $data;
    }
}
