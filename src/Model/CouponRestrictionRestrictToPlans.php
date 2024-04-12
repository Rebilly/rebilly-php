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

class CouponRestrictionRestrictToPlans implements RedemptionRestriction, CouponRestriction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('planIds', $data)) {
            $this->setPlanIds($data['planIds']);
        }
        if (array_key_exists('minimumQuantity', $data)) {
            $this->setMinimumQuantity($data['minimumQuantity']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'restrict-to-plans';
    }

    /**
     * @return string[]
     */
    public function getPlanIds(): array
    {
        return $this->fields['planIds'];
    }

    /**
     * @param string[] $planIds
     */
    public function setPlanIds(array $planIds): static
    {
        $this->fields['planIds'] = $planIds;

        return $this;
    }

    public function getMinimumQuantity(): ?int
    {
        return $this->fields['minimumQuantity'] ?? null;
    }

    public function setMinimumQuantity(null|int $minimumQuantity): static
    {
        $this->fields['minimumQuantity'] = $minimumQuantity;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-plans',
        ];
        if (array_key_exists('planIds', $this->fields)) {
            $data['planIds'] = $this->fields['planIds'];
        }
        if (array_key_exists('minimumQuantity', $this->fields)) {
            $data['minimumQuantity'] = $this->fields['minimumQuantity'];
        }

        return $data;
    }
}
