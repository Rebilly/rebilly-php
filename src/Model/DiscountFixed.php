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

class DiscountFixed implements Discount
{
    public const CONTEXT_ITEMS = 'items';

    public const CONTEXT_SHIPPING = 'shipping';

    public const CONTEXT_ITEMS_AND_SHIPPING = 'items-and-shipping';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
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
        return 'fixed';
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
            'type' => 'fixed',
        ];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('context', $this->fields)) {
            $data['context'] = $this->fields['context'];
        }

        return $data;
    }
}
