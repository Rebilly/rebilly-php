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

namespace Rebilly\Tests\Api;

use DomainException;
use Rebilly\Entities\Coupons\Discount;
use Rebilly\Entities\Coupons\Discounts\Fixed;
use Rebilly\Entities\Coupons\Discounts\Percent;
use Rebilly\Entities\Coupons\Restriction;
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
        $discount = new Percent();
        $discount->setValue(15);

        self::assertInstanceOf(Percent::class, $discount);
        self::assertSame(15, $discount->getValue());
        self::assertSame('percent', $discount->getType());
    }

    /**
     * @test
     */
    public function typeFixed()
    {
        $discount = new Fixed();
        $discount->setAmount(15);
        $discount->setCurrency('USD');

        self::assertInstanceOf(Fixed::class, $discount);
        self::assertSame(15, $discount->getAmount());
        self::assertSame('USD', $discount->getCurrency());
        self::assertSame('fixed', $discount->getType());
    }

    /**
     * @test
     */
    public function typeIsRequired()
    {
        $this->expectException(DomainException::class);
        Fixed::createFromData([
            'amount' => 15,
            'currency' => 'USD',
        ]);
    }

    /**
     * @test
     */
    public function typeMustBeCorrect()
    {
        $this->expectException(DomainException::class);
        Fixed::createFromData([
            'type' => 'wrong',
            'amount' => 15,
            'currency' => 'USD',
        ]);
    }

    /**
     * @test
     * @dataProvider provideDiscounts
     * @param mixed $data
     */
    public function discountCreateFromData($data)
    {
        $value = Discount::createFromData($data);
        self::assertInstanceOf(Discount::class, $value);
        self::assertSame($data, $value->jsonSerialize());
    }

    /**
     * @test
     */
    public function restrictionDiscountsPerRedemption()
    {
        $restriction = new DiscountsPerRedemption();
        $restriction->setQuantity(3);

        self::assertInstanceOf(DiscountsPerRedemption::class, $restriction);
        self::assertSame(3, $restriction->getQuantity());
        self::assertSame('discounts-per-redemption', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRedemptionsPerCustomer()
    {
        $restriction = new RedemptionsPerCustomer();
        $restriction->setQuantity(3);

        self::assertInstanceOf(RedemptionsPerCustomer::class, $restriction);
        self::assertSame(3, $restriction->getQuantity());
        self::assertSame('redemptions-per-customer', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRestrictToInvoices()
    {
        $restriction = new RestrictToInvoices();
        $restriction->setInvoiceIds(['123', '234']);

        self::assertInstanceOf(RestrictToInvoices::class, $restriction);
        self::assertSame(['123', '234'], $restriction->getInvoiceIds());
        self::assertSame('restrict-to-invoices', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRestrictToSubscriptions()
    {
        $restriction = new RestrictToSubscriptions();
        $restriction->setSubscriptionIds(['123', '234']);

        self::assertInstanceOf(RestrictToSubscriptions::class, $restriction);
        self::assertSame(['123', '234'], $restriction->getSubscriptionIds());
        self::assertSame('restrict-to-subscriptions', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionRestrictToPlans()
    {
        $restriction = new RestrictToPlans();
        $restriction->setPlanIds(['123', '234']);

        self::assertInstanceOf(RestrictToPlans::class, $restriction);
        self::assertSame(['123', '234'], $restriction->getPlanIds());
        self::assertSame('restrict-to-plans', $restriction->getType());
    }

    /**
     * @test
     */
    public function restrictionTypeIsRequired()
    {
        $this->expectException(DomainException::class);
        RestrictToPlans::createFromData([
            'planIds' => ['123', '234'],
        ]);
    }

    /**
     * @test
     */
    public function restrictionTypeMustBeCorrect()
    {
        $this->expectException(DomainException::class);
        RestrictToPlans::createFromData([
            'type' => 'wrong',
            'planIds' => ['123', '234'],
        ]);
    }

    /**
     * @test
     * @dataProvider provideRestrictions
     * @param mixed $data
     */
    public function restrictionCreateFromData($data)
    {
        $value = Restriction::createFromData($data);
        self::assertInstanceOf(Restriction::class, $value);
        self::assertSame($data, $value->jsonSerialize());
    }

    /**
     * @return array
     */
    public function provideDiscounts()
    {
        return [
            [
                [
                    'type' => 'fixed',
                    'amount' => 1,
                    'currency' => 'USD',
                ],
            ],
            [
                [
                    'type' => 'percent',
                    'value' => 10,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideRestrictions()
    {
        return [
            [
                [
                    'type' => 'discounts-per-redemption',
                    'quantity' => 1,
                ],
            ],
            [
                [
                    'type' => 'redemptions-per-customer',
                    'quantity' => 1,
                ],
            ],
            [
                [
                    'type' => 'restrict-to-invoices',
                    'invoiceIds' => ['123', '234'],
                ],
            ],
            [
                [
                    'type' => 'restrict-to-plans',
                    'planIds' => ['123', '234'],
                ],
            ],
            [
                [
                    'type' => 'restrict-to-subscriptions',
                    'subscriptionIds' => ['123', '234'],
                ],
            ],
        ];
    }
}
