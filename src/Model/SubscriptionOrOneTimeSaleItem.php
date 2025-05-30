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

class SubscriptionOrOneTimeSaleItem implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('quantityFilled', $data)) {
            $this->setQuantityFilled($data['quantityFilled']);
        }
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
        if (array_key_exists('usageLimits', $data)) {
            $this->setUsageLimits($data['usageLimits']);
        }
        if (array_key_exists('usageStatus', $data)) {
            $this->setUsageStatus($data['usageStatus']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('isModified', $data)) {
            $this->setIsModified($data['isModified']);
        }
        if (array_key_exists('isGrandfathered', $data)) {
            $this->setIsGrandfathered($data['isGrandfathered']);
        }
        if (array_key_exists('excludeFromMrr', $data)) {
            $this->setExcludeFromMrr($data['excludeFromMrr']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getPlanId(): ?string
    {
        return $this->fields['planId'] ?? null;
    }

    public function setPlanId(null|string $planId): static
    {
        $this->fields['planId'] = $planId;

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

    public function getQuantityFilled(): ?int
    {
        return $this->fields['quantityFilled'] ?? null;
    }

    public function setQuantityFilled(null|int $quantityFilled): static
    {
        $this->fields['quantityFilled'] = $quantityFilled;

        return $this;
    }

    public function getPlan(): ConfigurablePlan
    {
        return $this->fields['plan'];
    }

    public function setPlan(ConfigurablePlan|array $plan): static
    {
        if (!($plan instanceof ConfigurablePlan)) {
            $plan = ConfigurablePlanFactory::from($plan);
        }

        $this->fields['plan'] = $plan;

        return $this;
    }

    public function getUsageLimits(): ?UsageLimits
    {
        return $this->fields['usageLimits'] ?? null;
    }

    public function setUsageLimits(null|UsageLimits|array $usageLimits): static
    {
        if ($usageLimits !== null && !($usageLimits instanceof UsageLimits)) {
            $usageLimits = UsageLimits::from($usageLimits);
        }

        $this->fields['usageLimits'] = $usageLimits;

        return $this;
    }

    public function getUsageStatus(): ?SubscriptionOrOneTimeSaleItemUsageStatus
    {
        return $this->fields['usageStatus'] ?? null;
    }

    public function setUsageStatus(null|SubscriptionOrOneTimeSaleItemUsageStatus|array $usageStatus): static
    {
        if ($usageStatus !== null && !($usageStatus instanceof SubscriptionOrOneTimeSaleItemUsageStatus)) {
            $usageStatus = SubscriptionOrOneTimeSaleItemUsageStatus::from($usageStatus);
        }

        $this->fields['usageStatus'] = $usageStatus;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getIsModified(): ?bool
    {
        return $this->fields['isModified'] ?? null;
    }

    public function getIsGrandfathered(): ?bool
    {
        return $this->fields['isGrandfathered'] ?? null;
    }

    public function getExcludeFromMrr(): ?bool
    {
        return $this->fields['excludeFromMrr'] ?? null;
    }

    public function setExcludeFromMrr(null|bool $excludeFromMrr): static
    {
        $this->fields['excludeFromMrr'] = $excludeFromMrr;

        return $this;
    }

    public function getEmbedded(): ?SubscriptionOrOneTimeSaleItemEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|SubscriptionOrOneTimeSaleItemEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof SubscriptionOrOneTimeSaleItemEmbedded)) {
            $embedded = SubscriptionOrOneTimeSaleItemEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('quantityFilled', $this->fields)) {
            $data['quantityFilled'] = $this->fields['quantityFilled'];
        }
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']->jsonSerialize();
        }
        if (array_key_exists('usageLimits', $this->fields)) {
            $data['usageLimits'] = $this->fields['usageLimits']?->jsonSerialize();
        }
        if (array_key_exists('usageStatus', $this->fields)) {
            $data['usageStatus'] = $this->fields['usageStatus']?->jsonSerialize();
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('isModified', $this->fields)) {
            $data['isModified'] = $this->fields['isModified'];
        }
        if (array_key_exists('isGrandfathered', $this->fields)) {
            $data['isGrandfathered'] = $this->fields['isGrandfathered'];
        }
        if (array_key_exists('excludeFromMrr', $this->fields)) {
            $data['excludeFromMrr'] = $this->fields['excludeFromMrr'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setIsModified(null|bool $isModified): static
    {
        $this->fields['isModified'] = $isModified;

        return $this;
    }

    private function setIsGrandfathered(null|bool $isGrandfathered): static
    {
        $this->fields['isGrandfathered'] = $isGrandfathered;

        return $this;
    }
}
