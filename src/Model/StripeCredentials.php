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

class StripeCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('stripeClientId', $data)) {
            $this->setStripeClientId($data['stripeClientId']);
        }
        if (array_key_exists('stripeSecret', $data)) {
            $this->setStripeSecret($data['stripeSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStripeClientId(): ?string
    {
        return $this->fields['stripeClientId'] ?? null;
    }

    public function setStripeClientId(null|string $stripeClientId): static
    {
        $this->fields['stripeClientId'] = $stripeClientId;

        return $this;
    }

    public function getStripeSecret(): ?string
    {
        return $this->fields['stripeSecret'] ?? null;
    }

    public function setStripeSecret(null|string $stripeSecret): static
    {
        $this->fields['stripeSecret'] = $stripeSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('stripeClientId', $this->fields)) {
            $data['stripeClientId'] = $this->fields['stripeClientId'];
        }
        if (array_key_exists('stripeSecret', $this->fields)) {
            $data['stripeSecret'] = $this->fields['stripeSecret'];
        }

        return $data;
    }
}
