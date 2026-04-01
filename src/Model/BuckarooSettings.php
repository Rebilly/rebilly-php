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

class BuckarooSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('useSepaRecurring', $data)) {
            $this->setUseSepaRecurring($data['useSepaRecurring']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getUseSepaRecurring(): ?bool
    {
        return $this->fields['useSepaRecurring'] ?? null;
    }

    public function setUseSepaRecurring(null|bool $useSepaRecurring): static
    {
        $this->fields['useSepaRecurring'] = $useSepaRecurring;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useSepaRecurring', $this->fields)) {
            $data['useSepaRecurring'] = $this->fields['useSepaRecurring'];
        }

        return $data;
    }
}
