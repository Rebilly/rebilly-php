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

class OmniMatrixCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('secret', $data)) {
            $this->setSecret($data['secret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantId(): string
    {
        return $this->fields['merchantId'];
    }

    public function setMerchantId(string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getSecret(): string
    {
        return $this->fields['secret'];
    }

    public function setSecret(string $secret): static
    {
        $this->fields['secret'] = $secret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('secret', $this->fields)) {
            $data['secret'] = $this->fields['secret'];
        }

        return $data;
    }
}
