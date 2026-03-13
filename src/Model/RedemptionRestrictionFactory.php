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

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class RedemptionRestrictionFactory
{
    public static function from(array $data = [], array $metadata = []): RedemptionRestriction
    {
        return match ($data['type']) {
            'discounts-per-redemption' => CouponRestrictionDiscountPerRedemption::from($data, $metadata),
            'maximum-order-amount' => CouponRestrictionMaximumOrderAmount::from($data, $metadata),
            'minimum-order-amount' => CouponRestrictionMinimumOrderAmount::from($data, $metadata),
            'paid-by-time' => CouponRestrictionPaidByTime::from($data, $metadata),
            'restrict-to-invoices' => CouponRestrictionRestrictToInvoices::from($data, $metadata),
            'restrict-to-plans' => CouponRestrictionRestrictToPlans::from($data, $metadata),
            'restrict-to-products' => CouponRestrictionRestrictToProducts::from($data, $metadata),
            'restrict-to-subscriptions' => CouponRestrictionRestrictToSubscriptions::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
