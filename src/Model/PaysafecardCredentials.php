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

class PaysafecardCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('reconciliationApiKey', $data)) {
            $this->setReconciliationApiKey($data['reconciliationApiKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getReconciliationApiKey(): ?string
    {
        return $this->fields['reconciliationApiKey'] ?? null;
    }

    public function setReconciliationApiKey(null|string $reconciliationApiKey): static
    {
        $this->fields['reconciliationApiKey'] = $reconciliationApiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('reconciliationApiKey', $this->fields)) {
            $data['reconciliationApiKey'] = $this->fields['reconciliationApiKey'];
        }

        return $data;
    }
}
