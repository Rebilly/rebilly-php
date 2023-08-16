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

class Subset implements JsonSerializable
{
    public const MODE_SUBSET = 'subset';

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

    /**
     * @psalm-return self::MODE_*|null $mode
     */
    public function getMode(): ?string
    {
        return $this->fields['mode'] ?? null;
    }

    /**
     * @psalm-param self::MODE_*|null $mode
     */
    public function setMode(null|string $mode): static
    {
        $this->fields['mode'] = $mode;

        return $this;
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
        $values = array_map(fn ($value) => $value ?? null, $values);

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
