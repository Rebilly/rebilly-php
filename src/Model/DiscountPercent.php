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

class DiscountPercent implements Discount
{
    public const CONTEXT_ITEMS = 'items';

    public const CONTEXT_SHIPPING = 'shipping';

    public const CONTEXT_ITEMS_AND_SHIPPING = 'items-and-shipping';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('context', $data)) {
            $this->setContext($data['context']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'percent';
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

    public function getContext(): ?string
    {
        return $this->fields['context'] ?? null;
    }

    public function setContext(null|string $context): static
    {
        $this->fields['context'] = $context;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'percent',
        ];
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('context', $this->fields)) {
            $data['context'] = $this->fields['context'];
        }

        return $data;
    }
}
