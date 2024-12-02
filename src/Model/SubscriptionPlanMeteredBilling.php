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

class SubscriptionPlanMeteredBilling implements JsonSerializable
{
    public const STRATEGY_SUM = 'sum';

    public const STRATEGY_LAST = 'last';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('strategy', $data)) {
            $this->setStrategy($data['strategy']);
        }
        if (array_key_exists('min', $data)) {
            $this->setMin($data['min']);
        }
        if (array_key_exists('max', $data)) {
            $this->setMax($data['max']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStrategy(): string
    {
        return $this->fields['strategy'];
    }

    public function setStrategy(string $strategy): static
    {
        $this->fields['strategy'] = $strategy;

        return $this;
    }

    public function getMin(): ?float
    {
        return $this->fields['min'] ?? null;
    }

    public function setMin(null|float|string $min): static
    {
        if (is_string($min)) {
            $min = (float) $min;
        }

        $this->fields['min'] = $min;

        return $this;
    }

    public function getMax(): ?float
    {
        return $this->fields['max'] ?? null;
    }

    public function setMax(null|float|string $max): static
    {
        if (is_string($max)) {
            $max = (float) $max;
        }

        $this->fields['max'] = $max;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('strategy', $this->fields)) {
            $data['strategy'] = $this->fields['strategy'];
        }
        if (array_key_exists('min', $this->fields)) {
            $data['min'] = $this->fields['min'];
        }
        if (array_key_exists('max', $this->fields)) {
            $data['max'] = $this->fields['max'];
        }

        return $data;
    }
}
