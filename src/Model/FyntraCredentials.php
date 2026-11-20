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

class FyntraCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('clientSecret', $data)) {
            $this->setClientSecret($data['clientSecret']);
        }
        if (array_key_exists('pointOfSaleId', $data)) {
            $this->setPointOfSaleId($data['pointOfSaleId']);
        }
        if (array_key_exists('webhookSecret', $data)) {
            $this->setWebhookSecret($data['webhookSecret']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getPointOfSaleId(): string
    {
        return $this->fields['pointOfSaleId'];
    }

    public function setPointOfSaleId(string $pointOfSaleId): static
    {
        $this->fields['pointOfSaleId'] = $pointOfSaleId;

        return $this;
    }

    public function getWebhookSecret(): string
    {
        return $this->fields['webhookSecret'];
    }

    public function setWebhookSecret(string $webhookSecret): static
    {
        $this->fields['webhookSecret'] = $webhookSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('clientSecret', $this->fields)) {
            $data['clientSecret'] = $this->fields['clientSecret'];
        }
        if (array_key_exists('pointOfSaleId', $this->fields)) {
            $data['pointOfSaleId'] = $this->fields['pointOfSaleId'];
        }
        if (array_key_exists('webhookSecret', $this->fields)) {
            $data['webhookSecret'] = $this->fields['webhookSecret'];
        }

        return $data;
    }
}
