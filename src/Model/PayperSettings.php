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

class PayperSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('autodepositLookup', $data)) {
            $this->setAutodepositLookup($data['autodepositLookup']);
        }
        if (array_key_exists('autodepositLookupInterval', $data)) {
            $this->setAutodepositLookupInterval($data['autodepositLookupInterval']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAutodepositLookup(): ?bool
    {
        return $this->fields['autodepositLookup'] ?? null;
    }

    public function setAutodepositLookup(null|bool $autodepositLookup): static
    {
        $this->fields['autodepositLookup'] = $autodepositLookup;

        return $this;
    }

    public function getAutodepositLookupInterval(): ?int
    {
        return $this->fields['autodepositLookupInterval'] ?? null;
    }

    public function setAutodepositLookupInterval(null|int $autodepositLookupInterval): static
    {
        $this->fields['autodepositLookupInterval'] = $autodepositLookupInterval;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('autodepositLookup', $this->fields)) {
            $data['autodepositLookup'] = $this->fields['autodepositLookup'];
        }
        if (array_key_exists('autodepositLookupInterval', $this->fields)) {
            $data['autodepositLookupInterval'] = $this->fields['autodepositLookupInterval'];
        }

        return $data;
    }
}
