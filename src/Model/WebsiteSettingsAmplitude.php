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

class WebsiteSettingsAmplitude implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('tracking', $data)) {
            $this->setTracking($data['tracking']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTracking(): ?bool
    {
        return $this->fields['tracking'] ?? null;
    }

    public function setTracking(null|bool $tracking): static
    {
        $this->fields['tracking'] = $tracking;

        return $this;
    }

    public function getApiKey(): ?string
    {
        return $this->fields['apiKey'] ?? null;
    }

    public function setApiKey(null|string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('tracking', $this->fields)) {
            $data['tracking'] = $this->fields['tracking'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }

        return $data;
    }
}
