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

class VivaSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('sourceCode', $data)) {
            $this->setSourceCode($data['sourceCode']);
        }
        if (array_key_exists('customerTransaction', $data)) {
            $this->setCustomerTransaction($data['customerTransaction']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getSourceCode(): ?string
    {
        return $this->fields['sourceCode'] ?? null;
    }

    public function setSourceCode(null|string $sourceCode): static
    {
        $this->fields['sourceCode'] = $sourceCode;

        return $this;
    }

    public function getCustomerTransaction(): ?string
    {
        return $this->fields['customerTransaction'] ?? null;
    }

    public function setCustomerTransaction(null|string $customerTransaction): static
    {
        $this->fields['customerTransaction'] = $customerTransaction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sourceCode', $this->fields)) {
            $data['sourceCode'] = $this->fields['sourceCode'];
        }
        if (array_key_exists('customerTransaction', $this->fields)) {
            $data['customerTransaction'] = $this->fields['customerTransaction'];
        }

        return $data;
    }
}
