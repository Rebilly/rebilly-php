<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Api;

use DomainException;
use Rebilly\Entities\Coupons\Discounts\Fixed;
use Rebilly\Entities\Coupons\Discounts\Percent;
use Rebilly\Entities\Coupons\Restrictions\DiscountsPerRedemption;
use Rebilly\Entities\Coupons\Restrictions\RedemptionsPerCustomer;
use Rebilly\Entities\Coupons\Restrictions\RestrictToInvoices;
use Rebilly\Entities\Coupons\Restrictions\RestrictToPlans;
use Rebilly\Entities\Coupons\Restrictions\RestrictToSubscriptions;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class CouponTest.
 */
class CouponTest extends BaseTestCase
{
    /**
     * @test
     */
    public function typePercent()
    {
        /**
         * @var Percent $discount
         */
        $discount = Percent::createFromData([
            'type' => 'percent',
            'value' => 15,
        ]);

        self::assertInstanceOf(Percent::class, $discount);
        self::assertSame(15, $discount->getValue());
        self::assertSame('percent', $discount->getType());
    }

    /**
     * @test
     */
    public function typeFixed()
    {
        /**
         * @var Fixed $discount
         */
        $discount = Fixed::createFromData([
            'type' => 'fixed',
            'amount' => 15,
            'currency' => 'USD',
        ]);

        self::assertInstanceOf(Fixed::class, $discount);
        self::assertSame(15, $discount->getAmount());
        self::assertSame('USD', $discount->getCurrency());
        self::assertSame('fixed', $discount->getType());
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function typeIsRequired()
    {
        Fixed::createFromData([
            'amount' => 15,
            'currency' => 'USD',
        ]);
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function typeMustBeCorrect()
    {
        Fixed::createFromData([
            'type' => 'wrong',
            'amount' => 15,
            'currency' => 'USD',
        ]);
    }

    /**
     * @test
     */
    public function restrictionDiscountsPerRedemption()
    {
        /**
         * @var DiscountsPerRedemption $restriction
         */
        $restriction = DiscountsPerRedemption::createFromData([
            'type' => 'discounts-per-redemption',
            'quantity' => 3,
        ]);

        self::assertInstanceOf(DiscountsPerRedemption::class, $restriction);
        self::assertSame(3, $restriction->getQuantity());
        self::assertSame('discounts-per-redemption', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRedemptionsPerCustomer()
    {
        /**
         * @var RedemptionsPerCustomer $restriction
         */
        $restriction = RedemptionsPerCustomer::createFromData([
            'type' => 'redemptions-per-customer',
            'quantity' => 3,
        ]);

        self::assertInstanceOf(RedemptionsPerCustomer::class, $restriction);
        self::assertSame(3, $restriction->getQuantity());
        self::assertSame('redemptions-per-customer', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRestrictToInvoices()
    {
        /**
         * @var RestrictToInvoices $restriction
         */
        $restriction = RestrictToInvoices::createFromData([
            'type' => 'restrict-to-invoices',
            'invoiceIds' => ['123', '234'],
        ]);

        self::assertInstanceOf(RestrictToInvoices::class, $restriction);
        self::assertSame(['123', '234'], $restriction->getInvoiceIds());
        self::assertSame('restrict-to-invoices', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRestrictToSubscriptions()
    {
        /**
         * @var RestrictToSubscriptions $restriction
         */
        $restriction = RestrictToSubscriptions::createFromData([
            'type' => 'restrict-to-subscriptions',
            'subscriptionIds' => ['123', '234'],
        ]);

        self::assertInstanceOf(RestrictToSubscriptions::class, $restriction);
        self::assertSame(['123', '234'], $restriction->getSubscriptionIds());
        self::assertSame('restrict-to-subscriptions', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRestrictToPlans()
    {
        /**
         * @var RestrictToPlans $restriction
         */
        $restriction = RestrictToPlans::createFromData([
            'type' => 'restrict-to-plans',
            'planIds' => ['123', '234'],
        ]);

        self::assertInstanceOf(RestrictToPlans::class, $restriction);
        self::assertSame(['123', '234'], $restriction->getPlanIds());
        self::assertSame('restrict-to-plans', $restriction->getType());
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function restrictionTypeIsRequired()
    {
        RestrictToPlans::createFromData([
            'planIds' => ['123', '234'],
        ]);
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function restrictionTypeMustBeCorrect()
    {
        RestrictToPlans::createFromData([
            'type' => 'wrong',
            'planIds' => ['123', '234'],
        ]);
    }
}
