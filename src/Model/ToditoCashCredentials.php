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

class ToditoCashCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }

        return $data;
    }
}
