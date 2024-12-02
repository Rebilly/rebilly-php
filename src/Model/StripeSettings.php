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

class StripeSettings implements JsonSerializable
{
    public const SETUP_FUTURE_USAGE_OFF_SESSION = 'off_session';

    public const SETUP_FUTURE_USAGE_ON_SESSION = 'on_session';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('disablePaymentIntents', $data)) {
            $this->setDisablePaymentIntents($data['disablePaymentIntents']);
        }
        if (array_key_exists('enforceOffSession', $data)) {
            $this->setEnforceOffSession($data['enforceOffSession']);
        }
        if (array_key_exists('copyCredentialsFrom', $data)) {
            $this->setCopyCredentialsFrom($data['copyCredentialsFrom']);
        }
        if (array_key_exists('setupFutureUsage', $data)) {
            $this->setSetupFutureUsage($data['setupFutureUsage']);
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

    public function getDisablePaymentIntents(): ?bool
    {
        return $this->fields['disablePaymentIntents'] ?? null;
    }

    public function setDisablePaymentIntents(null|bool $disablePaymentIntents): static
    {
        $this->fields['disablePaymentIntents'] = $disablePaymentIntents;

        return $this;
    }

    public function getEnforceOffSession(): ?bool
    {
        return $this->fields['enforceOffSession'] ?? null;
    }

    public function setEnforceOffSession(null|bool $enforceOffSession): static
    {
        $this->fields['enforceOffSession'] = $enforceOffSession;

        return $this;
    }

    public function getCopyCredentialsFrom(): ?string
    {
        return $this->fields['copyCredentialsFrom'] ?? null;
    }

    public function setCopyCredentialsFrom(null|string $copyCredentialsFrom): static
    {
        $this->fields['copyCredentialsFrom'] = $copyCredentialsFrom;

        return $this;
    }

    public function getSetupFutureUsage(): ?string
    {
        return $this->fields['setupFutureUsage'] ?? null;
    }

    public function setSetupFutureUsage(null|string $setupFutureUsage): static
    {
        $this->fields['setupFutureUsage'] = $setupFutureUsage;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('disablePaymentIntents', $this->fields)) {
            $data['disablePaymentIntents'] = $this->fields['disablePaymentIntents'];
        }
        if (array_key_exists('enforceOffSession', $this->fields)) {
            $data['enforceOffSession'] = $this->fields['enforceOffSession'];
        }
        if (array_key_exists('copyCredentialsFrom', $this->fields)) {
            $data['copyCredentialsFrom'] = $this->fields['copyCredentialsFrom'];
        }
        if (array_key_exists('setupFutureUsage', $this->fields)) {
            $data['setupFutureUsage'] = $this->fields['setupFutureUsage'];
        }

        return $data;
    }
}
