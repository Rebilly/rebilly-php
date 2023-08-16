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

class Percent extends Discount
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'percent',
        ] + $data);

        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getValue(): float
    {
        return $this->fields['value'];
    }

    public function setValue(float|string $value): static
    {
        if (is_string($value)) {
            $value = (float) $value;
        }

        $this->fields['value'] = $value;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return parent::jsonSerialize() + $data;
    }
}
