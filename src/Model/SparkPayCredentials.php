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

class SparkPayCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('shopId', $data)) {
            $this->setShopId($data['shopId']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getShopId(): string
    {
        return $this->fields['shopId'];
    }

    public function setShopId(string $shopId): static
    {
        $this->fields['shopId'] = $shopId;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('shopId', $this->fields)) {
            $data['shopId'] = $this->fields['shopId'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }

        return $data;
    }
}
