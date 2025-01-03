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

class CountriesUnrestrictedMetadata implements CountriesMetadata
{
    public const MODE_UNKNOWN = 'unknown';

    public const MODE_ALL = 'all';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('mode', $data)) {
            $this->setMode($data['mode']);
        }
        if (array_key_exists('values', $data)) {
            $this->setValues($data['values']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMode(): string
    {
        return $this->fields['mode'];
    }

    public function setMode(string $mode): static
    {
        $this->fields['mode'] = $mode;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getValues(): ?array
    {
        return $this->fields['values'] ?? null;
    }

    /**
     * @param null|string[] $values
     */
    public function setValues(null|array $values): static
    {
        $this->fields['values'] = $values;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('mode', $this->fields)) {
            $data['mode'] = $this->fields['mode'];
        }
        if (array_key_exists('values', $this->fields)) {
            $data['values'] = $this->fields['values'];
        }

        return $data;
    }
}
