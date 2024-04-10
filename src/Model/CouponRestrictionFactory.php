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

class CouponRestrictionFactory
{
    public static function from(array $data = []): CouponRestriction
    {
        return match ($data['type']) {
            'discounts-per-redemption' => CouponRestrictionDiscountPerRedemption::from($data),
            'restrict-to-exclusive-application' => CouponRestrictionExclusiveApplication::from($data),
            'minimum-order-amount' => CouponRestrictionMinimumOrderAmount::from($data),
            'paid-by-time' => CouponRestrictionPaidByTime::from($data),
            'redemptions-per-customer' => CouponRestrictionRedemptionsPerCustomer::from($data),
            'restrict-to-bxgy' => CouponRestrictionRestrictToBxgy::from($data),
            'restrict-to-countries' => CouponRestrictionRestrictToCountries::from($data),
            'restrict-to-customers' => CouponRestrictionRestrictToCustomers::from($data),
            'restrict-to-customer-tags' => CouponRestrictionRestrictToCustomerTags::from($data),
            'restrict-to-invoices' => CouponRestrictionRestrictToInvoices::from($data),
            'restrict-to-plans' => CouponRestrictionRestrictToPlans::from($data),
            'restrict-to-products' => CouponRestrictionRestrictToProducts::from($data),
            'restrict-to-subscriptions' => CouponRestrictionRestrictToSubscriptions::from($data),
            'total-redemptions' => CouponRestrictionTotalRedemptions::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
