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
    public static function from(array $data = [], array $metadata = []): CouponRestriction
    {
        return match ($data['type']) {
            'discounts-per-redemption' => CouponRestrictionDiscountPerRedemption::from($data, $metadata),
            'restrict-to-exclusive-application' => CouponRestrictionExclusiveApplication::from($data, $metadata),
            'maximum-order-amount' => CouponRestrictionMaximumOrderAmount::from($data, $metadata),
            'minimum-order-amount' => CouponRestrictionMinimumOrderAmount::from($data, $metadata),
            'paid-by-time' => CouponRestrictionPaidByTime::from($data, $metadata),
            'redemptions-per-customer' => CouponRestrictionRedemptionsPerCustomer::from($data, $metadata),
            'restrict-to-bxgy' => CouponRestrictionRestrictToBxgy::from($data, $metadata),
            'restrict-to-countries' => CouponRestrictionRestrictToCountries::from($data, $metadata),
            'restrict-to-customers' => CouponRestrictionRestrictToCustomers::from($data, $metadata),
            'restrict-to-customer-tags' => CouponRestrictionRestrictToCustomerTags::from($data, $metadata),
            'restrict-to-invoices' => CouponRestrictionRestrictToInvoices::from($data, $metadata),
            'restrict-to-plans' => CouponRestrictionRestrictToPlans::from($data, $metadata),
            'restrict-to-products' => CouponRestrictionRestrictToProducts::from($data, $metadata),
            'restrict-to-subscriptions' => CouponRestrictionRestrictToSubscriptions::from($data, $metadata),
            'total-redemptions' => CouponRestrictionTotalRedemptions::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
