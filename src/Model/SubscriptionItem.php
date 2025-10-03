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

use DateTimeImmutable;
use DateTimeInterface;

class SubscriptionItem implements RecurringOrderItems
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('renewalReminderTime', $data)) {
            $this->setRenewalReminderTime($data['renewalReminderTime']);
        }
        if (array_key_exists('renewalReminderNumber', $data)) {
            $this->setRenewalReminderNumber($data['renewalReminderNumber']);
        }
        if (array_key_exists('trialReminderTime', $data)) {
            $this->setTrialReminderTime($data['trialReminderTime']);
        }
        if (array_key_exists('trialReminderNumber', $data)) {
            $this->setTrialReminderNumber($data['trialReminderNumber']);
        }
        if (array_key_exists('inTrial', $data)) {
            $this->setInTrial($data['inTrial']);
        }
        if (array_key_exists('trialEnabled', $data)) {
            $this->setTrialEnabled($data['trialEnabled']);
        }
        if (array_key_exists('trialEndTime', $data)) {
            $this->setTrialEndTime($data['trialEndTime']);
        }
        if (array_key_exists('trialOnly', $data)) {
            $this->setTrialOnly($data['trialOnly']);
        }
        if (array_key_exists('trialConversionTime', $data)) {
            $this->setTrialConversionTime($data['trialConversionTime']);
        }
        if (array_key_exists('recurringInterval', $data)) {
            $this->setRecurringInterval($data['recurringInterval']);
        }
        if (array_key_exists('renewalTime', $data)) {
            $this->setRenewalTime($data['renewalTime']);
        }
        if (array_key_exists('rebillNumber', $data)) {
            $this->setRebillNumber($data['rebillNumber']);
        }
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('quantityFilled', $data)) {
            $this->setQuantityFilled($data['quantityFilled']);
        }
        if (array_key_exists('usageLimits', $data)) {
            $this->setUsageLimits($data['usageLimits']);
        }
        if (array_key_exists('usageStatus', $data)) {
            $this->setUsageStatus($data['usageStatus']);
        }
        if (array_key_exists('excludeFromMrr', $data)) {
            $this->setExcludeFromMrr($data['excludeFromMrr']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'subscription';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getRenewalReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['renewalReminderTime'] ?? null;
    }

    public function getRenewalReminderNumber(): ?int
    {
        return $this->fields['renewalReminderNumber'] ?? null;
    }

    public function getTrialReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['trialReminderTime'] ?? null;
    }

    public function getTrialReminderNumber(): ?int
    {
        return $this->fields['trialReminderNumber'] ?? null;
    }

    public function getInTrial(): ?bool
    {
        return $this->fields['inTrial'] ?? null;
    }

    public function getTrialEnabled(): ?bool
    {
        return $this->fields['trialEnabled'] ?? null;
    }

    public function setTrialEnabled(null|bool $trialEnabled): static
    {
        $this->fields['trialEnabled'] = $trialEnabled;

        return $this;
    }

    public function getTrialEndTime(): ?DateTimeImmutable
    {
        return $this->fields['trialEndTime'] ?? null;
    }

    public function setTrialEndTime(null|DateTimeImmutable|string $trialEndTime): static
    {
        if ($trialEndTime !== null && !($trialEndTime instanceof DateTimeImmutable)) {
            $trialEndTime = new DateTimeImmutable($trialEndTime);
        }

        $this->fields['trialEndTime'] = $trialEndTime;

        return $this;
    }

    public function getTrialOnly(): ?bool
    {
        return $this->fields['trialOnly'] ?? null;
    }

    public function setTrialOnly(null|bool $trialOnly): static
    {
        $this->fields['trialOnly'] = $trialOnly;

        return $this;
    }

    public function getTrialConversionTime(): ?DateTimeImmutable
    {
        return $this->fields['trialConversionTime'] ?? null;
    }

    public function getRecurringInterval(): ?SubscriptionItemRecurringInterval
    {
        return $this->fields['recurringInterval'] ?? null;
    }

    public function setRecurringInterval(null|SubscriptionItemRecurringInterval|array $recurringInterval): static
    {
        if ($recurringInterval !== null && !($recurringInterval instanceof SubscriptionItemRecurringInterval)) {
            $recurringInterval = SubscriptionItemRecurringInterval::from($recurringInterval);
        }

        $this->fields['recurringInterval'] = $recurringInterval;

        return $this;
    }

    public function getRenewalTime(): ?DateTimeImmutable
    {
        return $this->fields['renewalTime'] ?? null;
    }

    public function setRenewalTime(null|DateTimeImmutable|string $renewalTime): static
    {
        if ($renewalTime !== null && !($renewalTime instanceof DateTimeImmutable)) {
            $renewalTime = new DateTimeImmutable($renewalTime);
        }

        $this->fields['renewalTime'] = $renewalTime;

        return $this;
    }

    public function getRebillNumber(): ?int
    {
        return $this->fields['rebillNumber'] ?? null;
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

    public function getQuantity(): ?int
    {
        return $this->fields['quantity'] ?? null;
    }

    public function setQuantity(null|int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getQuantityFilled(): ?float
    {
        return $this->fields['quantityFilled'] ?? null;
    }

    public function setQuantityFilled(null|float|string $quantityFilled): static
    {
        if (is_string($quantityFilled)) {
            $quantityFilled = (float) $quantityFilled;
        }

        $this->fields['quantityFilled'] = $quantityFilled;

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

    public function getUsageStatus(): ?UsageStatus
    {
        return $this->fields['usageStatus'] ?? null;
    }

    public function setUsageStatus(null|UsageStatus|array $usageStatus): static
    {
        if ($usageStatus !== null && !($usageStatus instanceof UsageStatus)) {
            $usageStatus = UsageStatus::from($usageStatus);
        }

        $this->fields['usageStatus'] = $usageStatus;

        return $this;
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

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'subscription',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('renewalReminderTime', $this->fields)) {
            $data['renewalReminderTime'] = $this->fields['renewalReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('renewalReminderNumber', $this->fields)) {
            $data['renewalReminderNumber'] = $this->fields['renewalReminderNumber'];
        }
        if (array_key_exists('trialReminderTime', $this->fields)) {
            $data['trialReminderTime'] = $this->fields['trialReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('trialReminderNumber', $this->fields)) {
            $data['trialReminderNumber'] = $this->fields['trialReminderNumber'];
        }
        if (array_key_exists('inTrial', $this->fields)) {
            $data['inTrial'] = $this->fields['inTrial'];
        }
        if (array_key_exists('trialEnabled', $this->fields)) {
            $data['trialEnabled'] = $this->fields['trialEnabled'];
        }
        if (array_key_exists('trialEndTime', $this->fields)) {
            $data['trialEndTime'] = $this->fields['trialEndTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('trialOnly', $this->fields)) {
            $data['trialOnly'] = $this->fields['trialOnly'];
        }
        if (array_key_exists('trialConversionTime', $this->fields)) {
            $data['trialConversionTime'] = $this->fields['trialConversionTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('recurringInterval', $this->fields)) {
            $data['recurringInterval'] = $this->fields['recurringInterval']?->jsonSerialize();
        }
        if (array_key_exists('renewalTime', $this->fields)) {
            $data['renewalTime'] = $this->fields['renewalTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('rebillNumber', $this->fields)) {
            $data['rebillNumber'] = $this->fields['rebillNumber'];
        }
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']->jsonSerialize();
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('quantityFilled', $this->fields)) {
            $data['quantityFilled'] = $this->fields['quantityFilled'];
        }
        if (array_key_exists('usageLimits', $this->fields)) {
            $data['usageLimits'] = $this->fields['usageLimits']?->jsonSerialize();
        }
        if (array_key_exists('usageStatus', $this->fields)) {
            $data['usageStatus'] = $this->fields['usageStatus']?->jsonSerialize();
        }
        if (array_key_exists('excludeFromMrr', $this->fields)) {
            $data['excludeFromMrr'] = $this->fields['excludeFromMrr'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setRenewalReminderTime(null|DateTimeImmutable|string $renewalReminderTime): static
    {
        if ($renewalReminderTime !== null && !($renewalReminderTime instanceof DateTimeImmutable)) {
            $renewalReminderTime = new DateTimeImmutable($renewalReminderTime);
        }

        $this->fields['renewalReminderTime'] = $renewalReminderTime;

        return $this;
    }

    private function setRenewalReminderNumber(null|int $renewalReminderNumber): static
    {
        $this->fields['renewalReminderNumber'] = $renewalReminderNumber;

        return $this;
    }

    private function setTrialReminderTime(null|DateTimeImmutable|string $trialReminderTime): static
    {
        if ($trialReminderTime !== null && !($trialReminderTime instanceof DateTimeImmutable)) {
            $trialReminderTime = new DateTimeImmutable($trialReminderTime);
        }

        $this->fields['trialReminderTime'] = $trialReminderTime;

        return $this;
    }

    private function setTrialReminderNumber(null|int $trialReminderNumber): static
    {
        $this->fields['trialReminderNumber'] = $trialReminderNumber;

        return $this;
    }

    private function setInTrial(null|bool $inTrial): static
    {
        $this->fields['inTrial'] = $inTrial;

        return $this;
    }

    private function setTrialConversionTime(null|DateTimeImmutable|string $trialConversionTime): static
    {
        if ($trialConversionTime !== null && !($trialConversionTime instanceof DateTimeImmutable)) {
            $trialConversionTime = new DateTimeImmutable($trialConversionTime);
        }

        $this->fields['trialConversionTime'] = $trialConversionTime;

        return $this;
    }

    private function setRebillNumber(null|int $rebillNumber): static
    {
        $this->fields['rebillNumber'] = $rebillNumber;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
