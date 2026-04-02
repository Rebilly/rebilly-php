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

class ChangeQuoteOrderUsageSettings implements JsonSerializable
{
    use HasMetadata;

    public const POLICY_RESET = 'reset';

    public const POLICY_TRANSFER = 'transfer';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('policy', $data)) {
            $this->setPolicy($data['policy']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getProductId(): string
    {
        return $this->fields['productId'];
    }

    public function setProductId(string $productId): static
    {
        $this->fields['productId'] = $productId;

        return $this;
    }

    public function getPolicy(): string
    {
        return $this->fields['policy'];
    }

    public function setPolicy(string $policy): static
    {
        $this->fields['policy'] = $policy;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('policy', $this->fields)) {
            $data['policy'] = $this->fields['policy'];
        }

        return $data;
    }
}
