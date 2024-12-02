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

class SecurionPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('secretApiKey', $data)) {
            $this->setSecretApiKey($data['secretApiKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSecretApiKey(): string
    {
        return $this->fields['secretApiKey'];
    }

    public function setSecretApiKey(string $secretApiKey): static
    {
        $this->fields['secretApiKey'] = $secretApiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('secretApiKey', $this->fields)) {
            $data['secretApiKey'] = $this->fields['secretApiKey'];
        }

        return $data;
    }
}
