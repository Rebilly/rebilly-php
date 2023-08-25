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

class OrbitalSettings implements JsonSerializable
{
    public const TARGET_CURRENCY_USD = 'USD';

    public const TARGET_CURRENCY_EUR = 'EUR';

    public const TARGET_CURRENCY_GBP = 'GBP';

    public const MAIN_CRYPTO_CURRENCY_ETH = 'ETH';

    public const MAIN_CRYPTO_CURRENCY_SOL = 'SOL';

    public const MAIN_CRYPTO_CURRENCY_TRX = 'TRX';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('targetCurrency', $data)) {
            $this->setTargetCurrency($data['targetCurrency']);
        }
        if (array_key_exists('mainCryptoCurrency', $data)) {
            $this->setMainCryptoCurrency($data['mainCryptoCurrency']);
        }
        if (array_key_exists('logoImageUrl', $data)) {
            $this->setLogoImageUrl($data['logoImageUrl']);
        }
        if (array_key_exists('productImageUrl', $data)) {
            $this->setProductImageUrl($data['productImageUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTargetCurrency(): ?string
    {
        return $this->fields['targetCurrency'] ?? null;
    }

    public function setTargetCurrency(null|string $targetCurrency): static
    {
        $this->fields['targetCurrency'] = $targetCurrency;

        return $this;
    }

    public function getMainCryptoCurrency(): ?string
    {
        return $this->fields['mainCryptoCurrency'] ?? null;
    }

    public function setMainCryptoCurrency(null|string $mainCryptoCurrency): static
    {
        $this->fields['mainCryptoCurrency'] = $mainCryptoCurrency;

        return $this;
    }

    public function getLogoImageUrl(): ?string
    {
        return $this->fields['logoImageUrl'] ?? null;
    }

    public function setLogoImageUrl(null|string $logoImageUrl): static
    {
        $this->fields['logoImageUrl'] = $logoImageUrl;

        return $this;
    }

    public function getProductImageUrl(): ?string
    {
        return $this->fields['productImageUrl'] ?? null;
    }

    public function setProductImageUrl(null|string $productImageUrl): static
    {
        $this->fields['productImageUrl'] = $productImageUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('targetCurrency', $this->fields)) {
            $data['targetCurrency'] = $this->fields['targetCurrency'];
        }
        if (array_key_exists('mainCryptoCurrency', $this->fields)) {
            $data['mainCryptoCurrency'] = $this->fields['mainCryptoCurrency'];
        }
        if (array_key_exists('logoImageUrl', $this->fields)) {
            $data['logoImageUrl'] = $this->fields['logoImageUrl'];
        }
        if (array_key_exists('productImageUrl', $this->fields)) {
            $data['productImageUrl'] = $this->fields['productImageUrl'];
        }

        return $data;
    }
}
