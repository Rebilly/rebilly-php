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

class PayUCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('merchantKey', $data)) {
            $this->setMerchantKey($data['merchantKey']);
        }
        if (array_key_exists('merchantSalt', $data)) {
            $this->setMerchantSalt($data['merchantSalt']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMerchantKey(): string
    {
        return $this->fields['merchantKey'];
    }

    public function setMerchantKey(string $merchantKey): static
    {
        $this->fields['merchantKey'] = $merchantKey;

        return $this;
    }

    public function getMerchantSalt(): string
    {
        return $this->fields['merchantSalt'];
    }

    public function setMerchantSalt(string $merchantSalt): static
    {
        $this->fields['merchantSalt'] = $merchantSalt;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantKey', $this->fields)) {
            $data['merchantKey'] = $this->fields['merchantKey'];
        }
        if (array_key_exists('merchantSalt', $this->fields)) {
            $data['merchantSalt'] = $this->fields['merchantSalt'];
        }

        return $data;
    }
}
