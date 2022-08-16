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

class DigitalWalletsGooglePay implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('isEnabled', $data)) {
            $this->setIsEnabled($data['isEnabled']);
        }
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
        if (array_key_exists('merchantOrigin', $data)) {
            $this->setMerchantOrigin($data['merchantOrigin']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getIsEnabled(): bool
    {
        return $this->fields['isEnabled'];
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->fields['isEnabled'] = $isEnabled;

        return $this;
    }

    public function getMerchantName(): ?string
    {
        return $this->fields['merchantName'] ?? null;
    }

    public function setMerchantName(null|string $merchantName): self
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getMerchantOrigin(): ?string
    {
        return $this->fields['merchantOrigin'] ?? null;
    }

    public function setMerchantOrigin(null|string $merchantOrigin): self
    {
        $this->fields['merchantOrigin'] = $merchantOrigin;

        return $this;
    }

    public function getCountry(): ?DigitalWalletCountry
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|DigitalWalletCountry|array $country): self
    {
        if ($country !== null && !($country instanceof DigitalWalletCountry)) {
            $country = DigitalWalletCountry::from($country);
        }

        $this->fields['country'] = $country;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('isEnabled', $this->fields)) {
            $data['isEnabled'] = $this->fields['isEnabled'];
        }
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }
        if (array_key_exists('merchantOrigin', $this->fields)) {
            $data['merchantOrigin'] = $this->fields['merchantOrigin'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country']?->jsonSerialize();
        }

        return $data;
    }
}
