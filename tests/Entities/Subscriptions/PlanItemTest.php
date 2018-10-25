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

use Rebilly\Entities\Subscriptions\PlanItem;
use Rebilly\Tests\TestCase;

class PlanItemTest extends TestCase
{
    /**
     * @test
     */
    public function usePlanTrial()
    {
        $expectedData = ['planId' => 'plan-1', 'quantity' => 2];

        $value = new PlanItem();
        $value->setPlanId('plan-1');
        $value->setQuantity(2);
        self::assertSame($expectedData, $value->jsonSerialize());

        $value = new PlanItem($expectedData);
        self::assertSame($expectedData['planId'], $value->getPlanId());
        self::assertSame($expectedData['quantity'], $value->getQuantity());
    }
}
