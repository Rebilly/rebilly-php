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

class PayPalSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('enableGuestCheckout', $data)) {
            $this->setEnableGuestCheckout($data['enableGuestCheckout']);
        }
        if (array_key_exists('useHostedCheckoutForm', $data)) {
            $this->setUseHostedCheckoutForm($data['useHostedCheckoutForm']);
        }
        if (array_key_exists('forceGuestCheckout', $data)) {
            $this->setForceGuestCheckout($data['forceGuestCheckout']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRedirectUrl(): string
    {
        return $this->fields['redirectUrl'];
    }

    public function setRedirectUrl(string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getEnableGuestCheckout(): ?bool
    {
        return $this->fields['enableGuestCheckout'] ?? null;
    }

    public function setEnableGuestCheckout(null|bool $enableGuestCheckout): static
    {
        $this->fields['enableGuestCheckout'] = $enableGuestCheckout;

        return $this;
    }

    public function getUseHostedCheckoutForm(): ?bool
    {
        return $this->fields['useHostedCheckoutForm'] ?? null;
    }

    public function setUseHostedCheckoutForm(null|bool $useHostedCheckoutForm): static
    {
        $this->fields['useHostedCheckoutForm'] = $useHostedCheckoutForm;

        return $this;
    }

    public function getForceGuestCheckout(): ?bool
    {
        return $this->fields['forceGuestCheckout'] ?? null;
    }

    public function setForceGuestCheckout(null|bool $forceGuestCheckout): static
    {
        $this->fields['forceGuestCheckout'] = $forceGuestCheckout;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('enableGuestCheckout', $this->fields)) {
            $data['enableGuestCheckout'] = $this->fields['enableGuestCheckout'];
        }
        if (array_key_exists('useHostedCheckoutForm', $this->fields)) {
            $data['useHostedCheckoutForm'] = $this->fields['useHostedCheckoutForm'];
        }
        if (array_key_exists('forceGuestCheckout', $this->fields)) {
            $data['forceGuestCheckout'] = $this->fields['forceGuestCheckout'];
        }

        return $data;
    }
}
