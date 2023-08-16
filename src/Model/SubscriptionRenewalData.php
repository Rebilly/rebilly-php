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

class SubscriptionRenewalData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('allRenewalCount', $data)) {
            $this->setAllRenewalCount($data['allRenewalCount']);
        }
        if (array_key_exists('allDunningCount', $data)) {
            $this->setAllDunningCount($data['allDunningCount']);
        }
        if (array_key_exists('abandonedCount', $data)) {
            $this->setAbandonedCount($data['abandonedCount']);
        }
        if (array_key_exists('paidRenewalCount', $data)) {
            $this->setPaidRenewalCount($data['paidRenewalCount']);
        }
        if (array_key_exists('paidDunningCount', $data)) {
            $this->setPaidDunningCount($data['paidDunningCount']);
        }
        if (array_key_exists('refundedRenewalCount', $data)) {
            $this->setRefundedRenewalCount($data['refundedRenewalCount']);
        }
        if (array_key_exists('refundedDunningCount', $data)) {
            $this->setRefundedDunningCount($data['refundedDunningCount']);
        }
        if (array_key_exists('chargebackRenewalCount', $data)) {
            $this->setChargebackRenewalCount($data['chargebackRenewalCount']);
        }
        if (array_key_exists('chargebackDunningCount', $data)) {
            $this->setChargebackDunningCount($data['chargebackDunningCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getAllRenewalCount(): ?int
    {
        return $this->fields['allRenewalCount'] ?? null;
    }

    public function setAllRenewalCount(null|int $allRenewalCount): static
    {
        $this->fields['allRenewalCount'] = $allRenewalCount;

        return $this;
    }

    public function getAllDunningCount(): ?int
    {
        return $this->fields['allDunningCount'] ?? null;
    }

    public function setAllDunningCount(null|int $allDunningCount): static
    {
        $this->fields['allDunningCount'] = $allDunningCount;

        return $this;
    }

    public function getAbandonedCount(): ?int
    {
        return $this->fields['abandonedCount'] ?? null;
    }

    public function setAbandonedCount(null|int $abandonedCount): static
    {
        $this->fields['abandonedCount'] = $abandonedCount;

        return $this;
    }

    public function getPaidRenewalCount(): ?int
    {
        return $this->fields['paidRenewalCount'] ?? null;
    }

    public function setPaidRenewalCount(null|int $paidRenewalCount): static
    {
        $this->fields['paidRenewalCount'] = $paidRenewalCount;

        return $this;
    }

    public function getPaidDunningCount(): ?int
    {
        return $this->fields['paidDunningCount'] ?? null;
    }

    public function setPaidDunningCount(null|int $paidDunningCount): static
    {
        $this->fields['paidDunningCount'] = $paidDunningCount;

        return $this;
    }

    public function getRefundedRenewalCount(): ?int
    {
        return $this->fields['refundedRenewalCount'] ?? null;
    }

    public function setRefundedRenewalCount(null|int $refundedRenewalCount): static
    {
        $this->fields['refundedRenewalCount'] = $refundedRenewalCount;

        return $this;
    }

    public function getRefundedDunningCount(): ?int
    {
        return $this->fields['refundedDunningCount'] ?? null;
    }

    public function setRefundedDunningCount(null|int $refundedDunningCount): static
    {
        $this->fields['refundedDunningCount'] = $refundedDunningCount;

        return $this;
    }

    public function getChargebackRenewalCount(): ?int
    {
        return $this->fields['chargebackRenewalCount'] ?? null;
    }

    public function setChargebackRenewalCount(null|int $chargebackRenewalCount): static
    {
        $this->fields['chargebackRenewalCount'] = $chargebackRenewalCount;

        return $this;
    }

    public function getChargebackDunningCount(): ?int
    {
        return $this->fields['chargebackDunningCount'] ?? null;
    }

    public function setChargebackDunningCount(null|int $chargebackDunningCount): static
    {
        $this->fields['chargebackDunningCount'] = $chargebackDunningCount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('allRenewalCount', $this->fields)) {
            $data['allRenewalCount'] = $this->fields['allRenewalCount'];
        }
        if (array_key_exists('allDunningCount', $this->fields)) {
            $data['allDunningCount'] = $this->fields['allDunningCount'];
        }
        if (array_key_exists('abandonedCount', $this->fields)) {
            $data['abandonedCount'] = $this->fields['abandonedCount'];
        }
        if (array_key_exists('paidRenewalCount', $this->fields)) {
            $data['paidRenewalCount'] = $this->fields['paidRenewalCount'];
        }
        if (array_key_exists('paidDunningCount', $this->fields)) {
            $data['paidDunningCount'] = $this->fields['paidDunningCount'];
        }
        if (array_key_exists('refundedRenewalCount', $this->fields)) {
            $data['refundedRenewalCount'] = $this->fields['refundedRenewalCount'];
        }
        if (array_key_exists('refundedDunningCount', $this->fields)) {
            $data['refundedDunningCount'] = $this->fields['refundedDunningCount'];
        }
        if (array_key_exists('chargebackRenewalCount', $this->fields)) {
            $data['chargebackRenewalCount'] = $this->fields['chargebackRenewalCount'];
        }
        if (array_key_exists('chargebackDunningCount', $this->fields)) {
            $data['chargebackDunningCount'] = $this->fields['chargebackDunningCount'];
        }

        return $data;
    }
}
