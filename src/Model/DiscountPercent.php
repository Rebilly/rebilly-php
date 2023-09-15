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

class DiscountPercent implements Discount, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('context', $data)) {
            $this->setContext($data['context']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
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

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

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
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }

        return $data;
    }
}
