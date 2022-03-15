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

namespace Rebilly\Tests\Entities\Coupons;

use Rebilly\Entities\Coupons\Redemption;
use Rebilly\Entities\Coupons\Restriction;
use Rebilly\Tests\TestCase;

final class RedemptionTest extends TestCase
{
    /**
     * @test
     */
    public function redeemWithRestrictionViaCreateData(): void
    {
        $incomingRestrictions = Restriction::createFromData(
            [
                'type' => Restriction::TYPE_DISCOUNTS_PER_REDEMPTION,
                'quantity' => 2,
            ]
        );

        $redemption = new Redemption(
            [
                'couponId' => 'coupon-1',
                'customerId' => 'customer-1',
            ]
        );

        $redemption->setAdditionalRestrictions([$incomingRestrictions]);
        self::assertRedemptionRestrictions($redemption);
    }

    /**
     * @test
     */
    public function redeemWithRestrictionViaArray(): void
    {
        $incomingRestrictions = [
            'type' => Restriction::TYPE_DISCOUNTS_PER_REDEMPTION,
            'quantity' => 2,
        ];

        $redemption = new Redemption(
            [
                'couponId' => 'coupon-1',
                'customerId' => 'customer-1',
            ]
        );

        $redemption->setAdditionalRestrictions([$incomingRestrictions]);
        self::assertRedemptionRestrictions($redemption);
    }

    private static function assertRedemptionRestrictions(Redemption $redemption): void
    {
        self::assertSame('customer-1', $redemption->getCustomerId());
        /** @var Restriction[] $restrictions */
        $restrictions = $redemption->getAdditionalRestrictions();
        self::assertCount(1, $restrictions);
        self::assertSame(Restriction::TYPE_DISCOUNTS_PER_REDEMPTION, $restrictions[0]->getType());
    }
}
