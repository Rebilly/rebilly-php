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

class AMLMetadata implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('lookupId', $data)) {
            $this->setLookupId($data['lookupId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getLookupId(): ?string
    {
        return $this->fields['lookupId'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('lookupId', $this->fields)) {
            $data['lookupId'] = $this->fields['lookupId'];
        }

        return $data;
    }

    private function setLookupId(null|string $lookupId): static
    {
        $this->fields['lookupId'] = $lookupId;

        return $this;
    }
}
