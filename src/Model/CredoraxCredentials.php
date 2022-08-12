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

class CredoraxCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        if (array_key_exists('merchantMd5Signature', $data)) {
            $this->setMerchantMd5Signature($data['merchantMd5Signature']);
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

    public function setMerchantId(string $merchantId): self
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }

    public function getMerchantMd5Signature(): string
    {
        return $this->fields['merchantMd5Signature'];
    }

    public function setMerchantMd5Signature(string $merchantMd5Signature): self
    {
        $this->fields['merchantMd5Signature'] = $merchantMd5Signature;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }
        if (array_key_exists('merchantMd5Signature', $this->fields)) {
            $data['merchantMd5Signature'] = $this->fields['merchantMd5Signature'];
        }

        return $data;
    }
}
