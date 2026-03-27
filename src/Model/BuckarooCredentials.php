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

class BuckarooCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('schemeKey', $data)) {
            $this->setSchemeKey($data['schemeKey']);
        }
        if (array_key_exists('websiteKey', $data)) {
            $this->setWebsiteKey($data['websiteKey']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getSchemeKey(): ?string
    {
        return $this->fields['schemeKey'] ?? null;
    }

    public function setSchemeKey(null|string $schemeKey): static
    {
        $this->fields['schemeKey'] = $schemeKey;

        return $this;
    }

    public function getWebsiteKey(): string
    {
        return $this->fields['websiteKey'];
    }

    public function setWebsiteKey(string $websiteKey): static
    {
        $this->fields['websiteKey'] = $websiteKey;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('schemeKey', $this->fields)) {
            $data['schemeKey'] = $this->fields['schemeKey'];
        }
        if (array_key_exists('websiteKey', $this->fields)) {
            $data['websiteKey'] = $this->fields['websiteKey'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }

        return $data;
    }
}
