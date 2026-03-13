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

class CyberSourceCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('accessKey', $data)) {
            $this->setAccessKey($data['accessKey']);
        }
        if (array_key_exists('profileId', $data)) {
            $this->setProfileId($data['profileId']);
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

    public function getAccessKey(): string
    {
        return $this->fields['accessKey'];
    }

    public function setAccessKey(string $accessKey): static
    {
        $this->fields['accessKey'] = $accessKey;

        return $this;
    }

    public function getProfileId(): string
    {
        return $this->fields['profileId'];
    }

    public function setProfileId(string $profileId): static
    {
        $this->fields['profileId'] = $profileId;

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
        if (array_key_exists('accessKey', $this->fields)) {
            $data['accessKey'] = $this->fields['accessKey'];
        }
        if (array_key_exists('profileId', $this->fields)) {
            $data['profileId'] = $this->fields['profileId'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }

        return $data;
    }
}
