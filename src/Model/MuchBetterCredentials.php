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

class MuchBetterCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('merchantAccountId', $data)) {
            $this->setMerchantAccountId($data['merchantAccountId']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMerchantAccountId(): string
    {
        return $this->fields['merchantAccountId'];
    }

    public function setMerchantAccountId(string $merchantAccountId): static
    {
        $this->fields['merchantAccountId'] = $merchantAccountId;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantAccountId', $this->fields)) {
            $data['merchantAccountId'] = $this->fields['merchantAccountId'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }

        return $data;
    }
}
