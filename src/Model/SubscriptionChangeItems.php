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

use InvalidArgumentException;
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPlan(): FlexiblePlan|OriginalPlan
    {
        return $this->fields['plan'];
    }

    public function setPlan(array|FlexiblePlan|OriginalPlan $plan): self
    {
        $plan = $this->ensurePlan($plan);

        $this->fields['plan'] = $plan;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(int $quantity): self
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }

        return $data;
    }

    protected function ensurePlan(array|FlexiblePlan|OriginalPlan $data): FlexiblePlan|OriginalPlan
    {
        if (
            $data instanceof \Rebilly\Sdk\Model\FlexiblePlan
            || $data instanceof \Rebilly\Sdk\Model\OriginalPlan
        ) {
            return $data;
        }
        $candidates = [];
        $candidates[] = \Rebilly\Sdk\Model\FlexiblePlan::tryFrom($data);
        $candidates[] = \Rebilly\Sdk\Model\OriginalPlan::tryFrom($data);

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if (
            $determined[0] instanceof \Rebilly\Sdk\Model\FlexiblePlan
            || $determined[0] instanceof \Rebilly\Sdk\Model\OriginalPlan
        ) {
            return $determined[0];
        }

        throw new InvalidArgumentException('Could not instantiate plan with the given value');
    }
}
