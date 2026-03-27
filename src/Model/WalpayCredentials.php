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

class WalpayCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
        if (array_key_exists('merchantPin', $data)) {
            $this->setMerchantPin($data['merchantPin']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMerchantName(): string
    {
        return $this->fields['merchantName'];
    }

    public function setMerchantName(string $merchantName): static
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getMerchantPin(): string
    {
        return $this->fields['merchantPin'];
    }

    public function setMerchantPin(string $merchantPin): static
    {
        $this->fields['merchantPin'] = $merchantPin;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }
        if (array_key_exists('merchantPin', $this->fields)) {
            $data['merchantPin'] = $this->fields['merchantPin'];
        }

        return $data;
    }
}
