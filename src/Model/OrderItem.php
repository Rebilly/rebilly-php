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

class OrderItem implements JsonSerializable
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
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
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
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
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

    public function setPlanId(null|string $planId): self
    {
        $this->fields['planId'] = $planId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->fields['quantity'] ?? null;
    }

    public function setQuantity(null|int $quantity): self
    {
        $this->fields['quantity'] = $quantity;

        return $this;
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

    /**
     * @return null|array{product:\Rebilly\Sdk\Model\Product}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan'];
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
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
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

    private function setRevision(null|int $revision): self
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setIsModified(null|bool $isModified): self
    {
        $this->fields['isModified'] = $isModified;

        return $this;
    }

    private function setIsGrandfathered(null|bool $isGrandfathered): self
    {
        $this->fields['isGrandfathered'] = $isGrandfathered;

        return $this;
    }

    /**
     * @param null|array{product:\Rebilly\Sdk\Model\Product} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['product'] = isset($embedded['product']) ? ($embedded['product'] instanceof \Rebilly\Sdk\Model\Product ? $embedded['product'] : \Rebilly\Sdk\Model\Product::from($embedded['product'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
