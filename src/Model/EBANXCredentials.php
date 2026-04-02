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

class EBANXCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('integrationKey', $data)) {
            $this->setIntegrationKey($data['integrationKey']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getIntegrationKey(): string
    {
        return $this->fields['integrationKey'];
    }

    public function setIntegrationKey(string $integrationKey): static
    {
        $this->fields['integrationKey'] = $integrationKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('integrationKey', $this->fields)) {
            $data['integrationKey'] = $this->fields['integrationKey'];
        }

        return $data;
    }
}
