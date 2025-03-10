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

class CheckoutFormFixedPlan implements CheckoutFormPlan
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
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

    public function getPlanId(): string
    {
        return $this->fields['planId'];
    }

    public function setPlanId(string $planId): static
    {
        $this->fields['planId'] = $planId;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'fixed',
        ];
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }

        return $data;
    }
}
