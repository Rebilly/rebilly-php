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

class AstroPayCardSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('oneTouchApi', $data)) {
            $this->setOneTouchApi($data['oneTouchApi']);
        }
        if (array_key_exists('useOneTouchSdk', $data)) {
            $this->setUseOneTouchSdk($data['useOneTouchSdk']);
        }
        if (array_key_exists('merchantName', $data)) {
            $this->setMerchantName($data['merchantName']);
        }
        if (array_key_exists('merchantLogoUrl', $data)) {
            $this->setMerchantLogoUrl($data['merchantLogoUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOneTouchApi(): ?bool
    {
        return $this->fields['oneTouchApi'] ?? null;
    }

    public function setOneTouchApi(null|bool $oneTouchApi): static
    {
        $this->fields['oneTouchApi'] = $oneTouchApi;

        return $this;
    }

    public function getUseOneTouchSdk(): ?bool
    {
        return $this->fields['useOneTouchSdk'] ?? null;
    }

    public function setUseOneTouchSdk(null|bool $useOneTouchSdk): static
    {
        $this->fields['useOneTouchSdk'] = $useOneTouchSdk;

        return $this;
    }

    public function getMerchantName(): ?string
    {
        return $this->fields['merchantName'] ?? null;
    }

    public function setMerchantName(null|string $merchantName): static
    {
        $this->fields['merchantName'] = $merchantName;

        return $this;
    }

    public function getMerchantLogoUrl(): ?string
    {
        return $this->fields['merchantLogoUrl'] ?? null;
    }

    public function setMerchantLogoUrl(null|string $merchantLogoUrl): static
    {
        $this->fields['merchantLogoUrl'] = $merchantLogoUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('oneTouchApi', $this->fields)) {
            $data['oneTouchApi'] = $this->fields['oneTouchApi'];
        }
        if (array_key_exists('useOneTouchSdk', $this->fields)) {
            $data['useOneTouchSdk'] = $this->fields['useOneTouchSdk'];
        }
        if (array_key_exists('merchantName', $this->fields)) {
            $data['merchantName'] = $this->fields['merchantName'];
        }
        if (array_key_exists('merchantLogoUrl', $this->fields)) {
            $data['merchantLogoUrl'] = $this->fields['merchantLogoUrl'];
        }

        return $data;
    }
}
