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

class SubscriptionChangeItems implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('usageLimits', $data)) {
            $this->setUsageLimits($data['usageLimits']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPlan(): FlexiblePlan
    {
        return $this->fields['plan'];
    }

    public function setPlan(FlexiblePlan|array $plan): static
    {
        if (!($plan instanceof FlexiblePlan)) {
            $plan = FlexiblePlan::from($plan);
        }

        $this->fields['plan'] = $plan;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->fields['quantity'] ?? null;
    }

    public function setQuantity(null|int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getUsageLimits(): ?SubscriptionOrOneTimeSaleItemUsageLimits
    {
        return $this->fields['usageLimits'] ?? null;
    }

    public function setUsageLimits(null|SubscriptionOrOneTimeSaleItemUsageLimits|array $usageLimits): static
    {
        if ($usageLimits !== null && !($usageLimits instanceof SubscriptionOrOneTimeSaleItemUsageLimits)) {
            $usageLimits = SubscriptionOrOneTimeSaleItemUsageLimits::from($usageLimits);
        }

        $this->fields['usageLimits'] = $usageLimits;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']?->jsonSerialize();
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('usageLimits', $this->fields)) {
            $data['usageLimits'] = $this->fields['usageLimits']?->jsonSerialize();
        }

        return $data;
    }
}
