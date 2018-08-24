<?php

declare(strict_types=1);

namespace Rebilly\Tests\Entities\Subscriptions;

use Rebilly\Entities\Plan;
use Rebilly\Entities\Subscriptions\PlanPricing;
use Rebilly\Entities\Subscriptions\PlanSetup;
use Rebilly\Entities\Subscriptions\PlanTrial;
use Rebilly\Entities\Subscriptions\Pricing\FixedFee;
use Rebilly\Entities\Subscriptions\RecurringInterval;
use Rebilly\Tests\TestCase;

final class PlanTest extends TestCase
{
    const DEFAULT_DATA = [
        'id' => 'plan-1',
        'isActive' => true,
        'name' => 'Plan name',
        'productId' => 'product-1',
        'description' => 'Plan description',
        'richDescription' => 'Plan rich description',
        'currency' => 'USD',
        'currencySign' => '$',
        'pricing' => [
            'formula' => PlanPricing::FIXED_FEE,
            'price' => 1.0,
        ],
        'recurringInterval' => [
            'unit' => 'month',
            'length' => 1,
            'limit' => 12,
        ],
        'trial' => [
            'price' => 5.0,
            'period' => [
                'unit' => 'week',
                'length' => 2,
            ],
        ],
        'setup' => [
            'price' => 1.0,
        ],
    ];

    /**
     * @test
     */
    public function buildObject()
    {
        $value = new Plan();
        $value->setIsActive(self::DEFAULT_DATA['isActive']);
        $value->setName(self::DEFAULT_DATA['name']);
        $value->setProductId(self::DEFAULT_DATA['productId']);
        $value->setDescription(self::DEFAULT_DATA['description']);
        $value->setRichDescription(self::DEFAULT_DATA['richDescription']);
        $value->setCurrency(self::DEFAULT_DATA['currency']);
        $value->setPricing($value->createPricing(self::DEFAULT_DATA['pricing']));
        $value->setRecurringInterval($value->createRecurringInterval(self::DEFAULT_DATA['recurringInterval']));
        $value->setTrial($value->createTrial(self::DEFAULT_DATA['trial']));
        $value->setSetup($value->createSetup(self::DEFAULT_DATA['setup']));

        $expectedJson = self::DEFAULT_DATA;
        unset(
            $expectedJson['id'],
            $expectedJson['currencySign']
        );

        self::assertSame($expectedJson, $value->jsonSerialize());
    }

    /**
     * @test
     */
    public function populatePlan()
    {
        $plan = new Plan(self::DEFAULT_DATA);

        self::assertSame(self::DEFAULT_DATA['id'], $plan->getId());
        self::assertSame(self::DEFAULT_DATA['isActive'], $plan->getIsActive());
        self::assertSame(self::DEFAULT_DATA['name'], $plan->getName());
        self::assertSame(self::DEFAULT_DATA['productId'], $plan->getProductId());
        self::assertSame(self::DEFAULT_DATA['description'], $plan->getDescription());
        self::assertSame(self::DEFAULT_DATA['richDescription'], $plan->getRichDescription());
        self::assertSame(self::DEFAULT_DATA['currency'], $plan->getCurrency());
        self::assertSame(self::DEFAULT_DATA['currencySign'], $plan->getCurrencySign());
        self::assertInstanceOf(FixedFee::class, $plan->getPricing());
        self::assertSame(self::DEFAULT_DATA['pricing'], $plan->getPricing()->jsonSerialize());
        self::assertInstanceOf(RecurringInterval::class, $plan->getRecurringInterval());
        self::assertSame(self::DEFAULT_DATA['recurringInterval'], $plan->getRecurringInterval()->jsonSerialize());
        self::assertInstanceOf(PlanTrial::class, $plan->getTrial());
        self::assertSame(self::DEFAULT_DATA['trial'], $plan->getTrial()->jsonSerialize());
        self::assertInstanceOf(PlanSetup::class, $plan->getSetup());
        self::assertSame(self::DEFAULT_DATA['setup'], $plan->getSetup()->jsonSerialize());
    }
}
