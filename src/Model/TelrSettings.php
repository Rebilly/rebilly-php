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

class TelrSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('transactionDescription', $data)) {
            $this->setTransactionDescription($data['transactionDescription']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTransactionDescription(): ?string
    {
        return $this->fields['transactionDescription'] ?? null;
    }

    public function setTransactionDescription(null|string $transactionDescription): static
    {
        $this->fields['transactionDescription'] = $transactionDescription;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionDescription', $this->fields)) {
            $data['transactionDescription'] = $this->fields['transactionDescription'];
        }

        return $data;
    }
}
