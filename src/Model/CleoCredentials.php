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

class CleoCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('accessToken', $data)) {
            $this->setAccessToken($data['accessToken']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAccessToken(): string
    {
        return $this->fields['accessToken'];
    }

    public function setAccessToken(string $accessToken): static
    {
        $this->fields['accessToken'] = $accessToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accessToken', $this->fields)) {
            $data['accessToken'] = $this->fields['accessToken'];
        }

        return $data;
    }
}
