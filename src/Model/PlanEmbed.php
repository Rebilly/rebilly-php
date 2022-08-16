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

class PlanEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPlan(): ?Plan
    {
        return $this->fields['plan'] ?? null;
    }

    public function setPlan(null|Plan|array $plan): self
    {
        if ($plan !== null && !($plan instanceof Plan)) {
            $plan = Plan::from($plan);
        }

        $this->fields['plan'] = $plan;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']?->jsonSerialize();
        }

        return $data;
    }
}
