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

class EProCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('apiSecretKey', $data)) {
            $this->setApiSecretKey($data['apiSecretKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getApiSecretKey(): string
    {
        return $this->fields['apiSecretKey'];
    }

    public function setApiSecretKey(string $apiSecretKey): static
    {
        $this->fields['apiSecretKey'] = $apiSecretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiSecretKey', $this->fields)) {
            $data['apiSecretKey'] = $this->fields['apiSecretKey'];
        }

        return $data;
    }
}
