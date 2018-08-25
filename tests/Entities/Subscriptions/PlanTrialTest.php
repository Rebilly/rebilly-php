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

use Rebilly\Entities\Subscriptions\PlanTrial;
use Rebilly\Entities\Subscriptions\PlanTrialPeriod;
use Rebilly\Tests\TestCase;

class PlanTrialTest extends TestCase
{
    /**
     * @test
     */
    public function usePlanTrial()
    {
        $expectedData = [
            'price' => 5.0,
            'period' => [
                'unit' => 'week',
                'length' => 2,
            ],
        ];

        $planTrialPeriod = new PlanTrialPeriod();
        $planTrialPeriod->setUnit('week');
        $planTrialPeriod->setLength(2);

        $planTrial = new PlanTrial();
        $planTrial->setPrice(5.0);
        $planTrial->setPeriod($planTrialPeriod);
        self::assertSame($expectedData, $planTrial->jsonSerialize());

        $planTrialPeriod = new PlanTrialPeriod($expectedData['period']);
        self::assertSame($expectedData['period']['unit'], $planTrialPeriod->getUnit());
        self::assertSame($expectedData['period']['length'], $planTrialPeriod->getLength());

        $planTrial = new PlanTrial($expectedData);
        self::assertSame($expectedData['price'], $planTrial->getPrice());
        self::assertInstanceOf(PlanTrialPeriod::class, $planTrial->getPeriod());
        self::assertSame($expectedData['period']['unit'], $planTrial->getPeriod()->getUnit());
        self::assertSame($expectedData['period']['length'], $planTrial->getPeriod()->getLength());
    }
}
