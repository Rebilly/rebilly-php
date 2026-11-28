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

class PayPalCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('partnerId', $data)) {
            $this->setPartnerId($data['partnerId']);
        }
        if (array_key_exists('partnerClientId', $data)) {
            $this->setPartnerClientId($data['partnerClientId']);
        }
        if (array_key_exists('partnerSecret', $data)) {
            $this->setPartnerSecret($data['partnerSecret']);
        }
        if (array_key_exists('partnerBnCode', $data)) {
            $this->setPartnerBnCode($data['partnerBnCode']);
        }
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPartnerId(): ?string
    {
        return $this->fields['partnerId'] ?? null;
    }

    public function setPartnerId(null|string $partnerId): static
    {
        $this->fields['partnerId'] = $partnerId;

        return $this;
    }

    public function getPartnerClientId(): ?string
    {
        return $this->fields['partnerClientId'] ?? null;
    }

    public function setPartnerClientId(null|string $partnerClientId): static
    {
        $this->fields['partnerClientId'] = $partnerClientId;

        return $this;
    }

    public function getPartnerSecret(): ?string
    {
        return $this->fields['partnerSecret'] ?? null;
    }

    public function setPartnerSecret(null|string $partnerSecret): static
    {
        $this->fields['partnerSecret'] = $partnerSecret;

        return $this;
    }

    public function getPartnerBnCode(): ?string
    {
        return $this->fields['partnerBnCode'] ?? null;
    }

    public function setPartnerBnCode(null|string $partnerBnCode): static
    {
        $this->fields['partnerBnCode'] = $partnerBnCode;

        return $this;
    }

    public function getMerchantId(): ?string
    {
        return $this->fields['merchantId'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('partnerId', $this->fields)) {
            $data['partnerId'] = $this->fields['partnerId'];
        }
        if (array_key_exists('partnerClientId', $this->fields)) {
            $data['partnerClientId'] = $this->fields['partnerClientId'];
        }
        if (array_key_exists('partnerSecret', $this->fields)) {
            $data['partnerSecret'] = $this->fields['partnerSecret'];
        }
        if (array_key_exists('partnerBnCode', $this->fields)) {
            $data['partnerBnCode'] = $this->fields['partnerBnCode'];
        }
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }

        return $data;
    }

    private function setMerchantId(null|string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

        return $this;
    }
}
