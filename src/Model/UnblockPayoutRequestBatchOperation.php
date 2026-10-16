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

class UnblockPayoutRequestBatchOperation implements PayoutRequestBatchOperationRequest
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('batchId', $data)) {
            $this->setBatchId($data['batchId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getType(): string
    {
        return 'unblock';
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

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'unblock',
        ];
        if (array_key_exists('batchId', $this->fields)) {
            $data['batchId'] = $this->fields['batchId'];
        }

        return $data;
    }
}
