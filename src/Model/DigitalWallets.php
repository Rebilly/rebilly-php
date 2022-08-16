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

class DigitalWallets implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('applePay', $data)) {
            $this->setApplePay($data['applePay']);
        }
        if (array_key_exists('googlePay', $data)) {
            $this->setGooglePay($data['googlePay']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApplePay(): ?DigitalWalletsApplePay
    {
        return $this->fields['applePay'] ?? null;
    }

    public function setApplePay(null|DigitalWalletsApplePay|array $applePay): self
    {
        if ($applePay !== null && !($applePay instanceof DigitalWalletsApplePay)) {
            $applePay = DigitalWalletsApplePay::from($applePay);
        }

        $this->fields['applePay'] = $applePay;

        return $this;
    }

    public function getGooglePay(): ?DigitalWalletsGooglePay
    {
        return $this->fields['googlePay'] ?? null;
    }

    public function setGooglePay(null|DigitalWalletsGooglePay|array $googlePay): self
    {
        if ($googlePay !== null && !($googlePay instanceof DigitalWalletsGooglePay)) {
            $googlePay = DigitalWalletsGooglePay::from($googlePay);
        }

        $this->fields['googlePay'] = $googlePay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('applePay', $this->fields)) {
            $data['applePay'] = $this->fields['applePay']?->jsonSerialize();
        }
        if (array_key_exists('googlePay', $this->fields)) {
            $data['googlePay'] = $this->fields['googlePay']?->jsonSerialize();
        }

        return $data;
    }
}
