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

class ChillstockSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('sandbox', $data)) {
            $this->setSandbox($data['sandbox']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getSandbox(): ?bool
    {
        return $this->fields['sandbox'] ?? null;
    }

    public function setSandbox(null|bool $sandbox): static
    {
        $this->fields['sandbox'] = $sandbox;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sandbox', $this->fields)) {
            $data['sandbox'] = $this->fields['sandbox'];
        }

        return $data;
    }
}
