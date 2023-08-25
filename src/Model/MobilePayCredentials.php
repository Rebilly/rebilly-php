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

class MobilePayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('providerId', $data)) {
            $this->setProviderId($data['providerId']);
        }
        if (array_key_exists('merchantVat', $data)) {
            $this->setMerchantVat($data['merchantVat']);
        }
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('clientSecret', $data)) {
            $this->setClientSecret($data['clientSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getProviderId(): string
    {
        return $this->fields['providerId'];
    }

    public function setProviderId(string $providerId): static
    {
        $this->fields['providerId'] = $providerId;

        return $this;
    }

    public function getMerchantVat(): string
    {
        return $this->fields['merchantVat'];
    }

    public function setMerchantVat(string $merchantVat): static
    {
        $this->fields['merchantVat'] = $merchantVat;

        return $this;
    }

    public function getClientId(): string
    {
        return $this->fields['clientId'];
    }

    public function setClientId(string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

        return $this;
    }

    public function getClientSecret(): string
    {
        return $this->fields['clientSecret'];
    }

    public function setClientSecret(string $clientSecret): static
    {
        $this->fields['clientSecret'] = $clientSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('providerId', $this->fields)) {
            $data['providerId'] = $this->fields['providerId'];
        }
        if (array_key_exists('merchantVat', $this->fields)) {
            $data['merchantVat'] = $this->fields['merchantVat'];
        }
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('clientSecret', $this->fields)) {
            $data['clientSecret'] = $this->fields['clientSecret'];
        }

        return $data;
    }
}
