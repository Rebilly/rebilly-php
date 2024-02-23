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

class BillingPortalPlans implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_ARCHIVED = 'archived';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPlan(): ?FlexiblePlan
    {
        return $this->fields['plan'] ?? null;
    }

    public function setPlan(null|FlexiblePlan|array $plan): static
    {
        if ($plan !== null && !($plan instanceof FlexiblePlan)) {
            $plan = FlexiblePlan::from($plan);
        }

        $this->fields['plan'] = $plan;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']?->jsonSerialize();
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }

        return $data;
    }
}
