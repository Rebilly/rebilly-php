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

class PayoutRequestBatchOperation implements JsonSerializable
{
    use HasMetadata;

    public const TYPE_APPROVE = 'approve';

    public const TYPE_BLOCK = 'block';

    public const TYPE_UNBLOCK = 'unblock';

    public const TYPE_AUTO_ALLOCATE = 'auto-allocate';

    public const TYPE_PROCESS = 'process';

    public const TYPE_ADD = 'add';

    public const TYPE_REMOVE = 'remove';

    public const STATUS_COMPLETED = 'completed';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('batchId', $data)) {
            $this->setBatchId($data['batchId']);
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

    public function getBatchId(): string
    {
        return $this->fields['batchId'];
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
        if (array_key_exists('batchId', $this->fields)) {
            $data['batchId'] = $this->fields['batchId'];
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

    private function setBatchId(string $batchId): static
    {
        $this->fields['batchId'] = $batchId;

        return $this;
    }

    private function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }
}
