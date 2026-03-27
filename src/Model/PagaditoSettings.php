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

class PagaditoSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('useRecurringApi', $data)) {
            $this->setUseRecurringApi($data['useRecurringApi']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getUseRecurringApi(): ?bool
    {
        return $this->fields['useRecurringApi'] ?? null;
    }

    public function setUseRecurringApi(null|bool $useRecurringApi): static
    {
        $this->fields['useRecurringApi'] = $useRecurringApi;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useRecurringApi', $this->fields)) {
            $data['useRecurringApi'] = $this->fields['useRecurringApi'];
        }

        return $data;
    }
}
