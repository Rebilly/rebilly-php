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

class FyntraSettings implements JsonSerializable
{
    use HasMetadata;

    public const CHECKOUT_CURRENCY_USDC = 'USDC';

    public const CHECKOUT_CURRENCY_USDT = 'USDT';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('checkoutCurrency', $data)) {
            $this->setCheckoutCurrency($data['checkoutCurrency']);
        }
        if (array_key_exists('minAmount', $data)) {
            $this->setMinAmount($data['minAmount']);
        }
        if (array_key_exists('maxAmount', $data)) {
            $this->setMaxAmount($data['maxAmount']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCheckoutCurrency(): ?string
    {
        return $this->fields['checkoutCurrency'] ?? null;
    }

    public function setCheckoutCurrency(null|string $checkoutCurrency): static
    {
        $this->fields['checkoutCurrency'] = $checkoutCurrency;

        return $this;
    }

    public function getMinAmount(): ?float
    {
        return $this->fields['minAmount'] ?? null;
    }

    public function setMinAmount(null|float|string $minAmount): static
    {
        if (is_string($minAmount)) {
            $minAmount = (float) $minAmount;
        }

        $this->fields['minAmount'] = $minAmount;

        return $this;
    }

    public function getMaxAmount(): ?float
    {
        return $this->fields['maxAmount'] ?? null;
    }

    public function setMaxAmount(null|float|string $maxAmount): static
    {
        if (is_string($maxAmount)) {
            $maxAmount = (float) $maxAmount;
        }

        $this->fields['maxAmount'] = $maxAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('checkoutCurrency', $this->fields)) {
            $data['checkoutCurrency'] = $this->fields['checkoutCurrency'];
        }
        if (array_key_exists('minAmount', $this->fields)) {
            $data['minAmount'] = $this->fields['minAmount'];
        }
        if (array_key_exists('maxAmount', $this->fields)) {
            $data['maxAmount'] = $this->fields['maxAmount'];
        }

        return $data;
    }
}
