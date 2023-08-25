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
            'discounts-per-redemption' => DiscountsPerRedemption::from($data),
            'minimum-order-amount' => MinimumOrderAmount::from($data),
            'paid-by-time' => PaidByTime::from($data),
            'redemptions-per-customer' => RedemptionsPerCustomer::from($data),
            'restrict-to-bxgy' => RestrictToBxgy::from($data),
            'restrict-to-countries' => RestrictToCountries::from($data),
            'restrict-to-invoices' => RestrictToInvoices::from($data),
            'restrict-to-plans' => RestrictToPlans::from($data),
            'restrict-to-products' => RestrictToProducts::from($data),
            'restrict-to-subscriptions' => RestrictToSubscriptions::from($data),
            'total-redemptions' => TotalRedemptions::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
