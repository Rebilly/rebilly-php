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

class AuthorizeNetCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('apiLoginId', $data)) {
            $this->setApiLoginId($data['apiLoginId']);
        }
        if (array_key_exists('transactionKey', $data)) {
            $this->setTransactionKey($data['transactionKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getApiLoginId(): string
    {
        return $this->fields['apiLoginId'];
    }

    public function setApiLoginId(string $apiLoginId): static
    {
        $this->fields['apiLoginId'] = $apiLoginId;

        return $this;
    }

    public function getTransactionKey(): string
    {
        return $this->fields['transactionKey'];
    }

    public function setTransactionKey(string $transactionKey): static
    {
        $this->fields['transactionKey'] = $transactionKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiLoginId', $this->fields)) {
            $data['apiLoginId'] = $this->fields['apiLoginId'];
        }
        if (array_key_exists('transactionKey', $this->fields)) {
            $data['transactionKey'] = $this->fields['transactionKey'];
        }

        return $data;
    }
}
