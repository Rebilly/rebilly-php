<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillyPlan;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyPlanTest extends TestCase
{
    /**
     * @test
     */
    public function createPlanJson()
    {
        $plan = new RebillyPlan();
        $plan->isActive = true;
        $plan->name = '5 days trial';
        $plan->currency = 'USD';
        $plan->description = 'free 5 days trial';
        $plan->recurringAmount = '10.00';
        $plan->recurringPeriodUnit = 'monthly';
        $plan->recurringPeriodLength = '1';
        $plan->trialPeriodUnit = 'daily';
        $plan->trialPeriodLength = '5';
        $plan->trialAmount = '0.00';
        $plan->setupAmount = '10.00';
        $plan->expireTime = '2014-12-12 12:00:00';

        $this->assertEquals(
            '{"isActive":true,"name":"5 days trial","currency":"USD","description":"free 5 days trial","recurringAmount":"10.00","recurringPeriodUnit":"monthly","recurringPeriodLength":"1","trialAmount":"0.00","trialPeriodUnit":"daily","trialPeriodLength":"5","setupAmount":"10.00","expireTime":"2014-12-12 12:00:00"}',
            $plan->buildRequest($plan)
        );
    }

    /**
     * @todo Since we change to new API
     */
    public function deletePlanJson()
    {
        // ID is in the URL now, this test is useless now
        // $plan = new RebillyPlan('plan123ABC');
        // $this->assertEquals('{"id":"plan123ABC"}', $plan->buildRequest($plan));
    }
}
