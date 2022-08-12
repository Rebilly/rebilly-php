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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRedirectUrl(): string
    {
        return $this->fields['redirectUrl'];
    }

    public function setRedirectUrl(string $redirectUrl): self
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getDisablePaymentIntents(): ?bool
    {
        return $this->fields['disablePaymentIntents'] ?? null;
    }

    public function setDisablePaymentIntents(null|bool $disablePaymentIntents): self
    {
        $this->fields['disablePaymentIntents'] = $disablePaymentIntents;

        return $this;
    }

    public function getEnforceOffSession(): ?bool
    {
        return $this->fields['enforceOffSession'] ?? null;
    }

    public function setEnforceOffSession(null|bool $enforceOffSession): self
    {
        $this->fields['enforceOffSession'] = $enforceOffSession;

        return $this;
    }

    public function getCopyCredentialsFrom(): ?string
    {
        return $this->fields['copyCredentialsFrom'] ?? null;
    }

    public function setCopyCredentialsFrom(null|string $copyCredentialsFrom): self
    {
        $this->fields['copyCredentialsFrom'] = $copyCredentialsFrom;

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

        return $data;
    }
}
