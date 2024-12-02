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

class CountriesSubsetMetadata implements CountriesMetadata
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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
        return 'subset';
    }

    /**
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->fields['values'];
    }

    /**
     * @param string[] $values
     */
    public function setValues(array $values): static
    {
        $this->fields['values'] = $values;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'mode' => 'subset',
        ];
        if (array_key_exists('values', $this->fields)) {
            $data['values'] = $this->fields['values'];
        }

        return $data;
    }
}
