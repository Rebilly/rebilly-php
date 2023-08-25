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

class CheckoutFormVariablePlan implements CheckoutFormPlan, JsonSerializable
{
    public const TYPE_VARIABLE = 'variable';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('minimum', $data)) {
            $this->setMinimum($data['minimum']);
        }
        if (array_key_exists('multipleOf', $data)) {
            $this->setMultipleOf($data['multipleOf']);
        }
        if (array_key_exists('maximum', $data)) {
            $this->setMaximum($data['maximum']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

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

    public function getMinimum(): ?int
    {
        return $this->fields['minimum'] ?? null;
    }

    public function setMinimum(null|int $minimum): static
    {
        $this->fields['minimum'] = $minimum;

        return $this;
    }

    public function getMultipleOf(): ?int
    {
        return $this->fields['multipleOf'] ?? null;
    }

    public function setMultipleOf(null|int $multipleOf): static
    {
        $this->fields['multipleOf'] = $multipleOf;

        return $this;
    }

    public function getMaximum(): ?int
    {
        return $this->fields['maximum'] ?? null;
    }

    public function setMaximum(null|int $maximum): static
    {
        $this->fields['maximum'] = $maximum;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('minimum', $this->fields)) {
            $data['minimum'] = $this->fields['minimum'];
        }
        if (array_key_exists('multipleOf', $this->fields)) {
            $data['multipleOf'] = $this->fields['multipleOf'];
        }
        if (array_key_exists('maximum', $this->fields)) {
            $data['maximum'] = $this->fields['maximum'];
        }

        return $data;
    }
}
