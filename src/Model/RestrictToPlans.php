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

class RestrictToPlans extends CouponRestriction
{
    public const TYPE_DISCOUNTS_PER_REDEMPTION = 'discounts-per-redemption';

    public const TYPE_MINIMUM_ORDER_AMOUNT = 'minimum-order-amount';

    public const TYPE_RESTRICT_TO_INVOICES = 'restrict-to-invoices';

    public const TYPE_RESTRICT_TO_PLANS = 'restrict-to-plans';

    public const TYPE_RESTRICT_TO_SUBSCRIPTIONS = 'restrict-to-subscriptions';

    public const TYPE_RESTRICT_TO_PRODUCTS = 'restrict-to-products';

    public const TYPE_PAID_BY_TIME = 'paid-by-time';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'restrict-to-plans',
        ] + $data);

        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
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

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
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
        $planIds = array_map(fn ($value) => $value ?? null, $planIds);

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
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('planIds', $this->fields)) {
            $data['planIds'] = $this->fields['planIds'];
        }
        if (array_key_exists('minimumQuantity', $this->fields)) {
            $data['minimumQuantity'] = $this->fields['minimumQuantity'];
        }

        return parent::jsonSerialize() + $data;
    }
}
