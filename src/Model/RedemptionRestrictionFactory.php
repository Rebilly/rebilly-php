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
    public static function from(array $data = []): RedemptionRestriction
    {
        return match ($data['type']) {
            'discounts-per-redemption' => CouponRestrictionDiscountPerRedemption::from($data),
            'minimum-order-amount' => CouponRestrictionMinimumOrderAmount::from($data),
            'paid-by-time' => CouponRestrictionPaidByTime::from($data),
            'restrict-to-invoices' => CouponRestrictionRestrictToInvoices::from($data),
            'restrict-to-plans' => CouponRestrictionRestrictToPlans::from($data),
            'restrict-to-products' => CouponRestrictionRestrictToProducts::from($data),
            'restrict-to-subscriptions' => CouponRestrictionRestrictToSubscriptions::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
