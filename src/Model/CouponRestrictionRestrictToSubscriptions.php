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

class CouponRestrictionRestrictToSubscriptions implements RedemptionRestriction, CouponRestriction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('subscriptionIds', $data)) {
            $this->setSubscriptionIds($data['subscriptionIds']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'restrict-to-subscriptions';
    }

    /**
     * @return string[]
     */
    public function getSubscriptionIds(): array
    {
        return $this->fields['subscriptionIds'];
    }

    /**
     * @param string[] $subscriptionIds
     */
    public function setSubscriptionIds(array $subscriptionIds): static
    {
        $this->fields['subscriptionIds'] = $subscriptionIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-subscriptions',
        ];
        if (array_key_exists('subscriptionIds', $this->fields)) {
            $data['subscriptionIds'] = $this->fields['subscriptionIds'];
        }

        return $data;
    }
}
