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

use Rebilly\Entities\Subscriptions\PlanSetup;
use Rebilly\Tests\TestCase;

class PlanSetupTest extends TestCase
{
    /**
     * @test
     */
    public function usePlanTrial()
    {
        $expectedData = [
            'price' => 1.0,
        ];

        $planTrial = new PlanSetup();
        $planTrial->setPrice(1.0);
        self::assertSame($expectedData, $planTrial->jsonSerialize());

        $planTrial = new PlanSetup($expectedData);
        self::assertSame($expectedData['price'], $planTrial->getPrice());
    }
}
