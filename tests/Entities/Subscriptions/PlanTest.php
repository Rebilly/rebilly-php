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
    private static function getDefaultData()
    {
        return [
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
    }

    /**
     * @test
     */
    public function buildObjectUsingSetterToSendToServer()
    {
        $data = self::getDefaultData();

        $value = new Plan();
        $value->setIsActive($data['isActive']);
        $value->setName($data['name']);
        $value->setProductId($data['productId']);
        $value->setDescription($data['description']);
        $value->setRichDescription($data['richDescription']);
        $value->setCurrency($data['currency']);
        $value->setPricing($value->createPricing($data['pricing']));
        $value->setRecurringInterval($value->createRecurringInterval($data['recurringInterval']));
        $value->setTrial($value->createTrial($data['trial']));
        $value->setSetup($value->createSetup($data['setup']));

        $expectedJson = $data;
        // Unset read-only properties which we not set.
        unset(
            $expectedJson['id'],
            $expectedJson['currencySign']
        );

        self::assertSame($expectedJson, $value->jsonSerialize());
    }

    /**
     * @test
     */
    public function populatePlanFromArrayReceivedFromServer()
    {
        $data = self::getDefaultData();

        $plan = new Plan($data);

        self::assertSame($data['id'], $plan->getId());
        self::assertSame($data['isActive'], $plan->getIsActive());
        self::assertSame($data['name'], $plan->getName());
        self::assertSame($data['productId'], $plan->getProductId());
        self::assertSame($data['description'], $plan->getDescription());
        self::assertSame($data['richDescription'], $plan->getRichDescription());
        self::assertSame($data['currency'], $plan->getCurrency());
        self::assertSame($data['currencySign'], $plan->getCurrencySign());
        self::assertInstanceOf(FixedFee::class, $plan->getPricing());
        self::assertSame($data['pricing'], $plan->getPricing()->jsonSerialize());
        self::assertInstanceOf(RecurringInterval::class, $plan->getRecurringInterval());
        self::assertSame($data['recurringInterval'], $plan->getRecurringInterval()->jsonSerialize());
        self::assertInstanceOf(PlanTrial::class, $plan->getTrial());
        self::assertSame($data['trial'], $plan->getTrial()->jsonSerialize());
        self::assertInstanceOf(PlanSetup::class, $plan->getSetup());
        self::assertSame($data['setup'], $plan->getSetup()->jsonSerialize());
    }
}
