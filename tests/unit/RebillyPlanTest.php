<?php
/**
 * Class RebillyPlanTest - Test JSON request Plan
 */

class RebillyPlanTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test Create Plan JSON request
     */
    public function testCreate()
    {
        $plan = new RebillyPlan();
        $plan->name = '5 days trial';
        $plan->isActive = true;
        $plan->currency = 'USD';
        $plan->description = 'free 5 days trial';
        $plan->expireTime = '2014-12-12 12:00:00';
        $plan->recurringAmount = '10.00';
        $plan->recurringPeriodUnit = 'monthly';
        $plan->recurringPeriodLength = '1';
        $plan->trialPeriodUnit = 'daily';
        $plan->trialPeriodLength = '5';
        $plan->trialAmount = '0.00';
        $plan->setupAmount = '10.00';

        $this->assertEquals(
            '{"name":"5 days trial","isActive":true,"currency":"USD","description":"free 5 days trial","expireTime":"2014-12-12 12:00:00","setupAmount":"10.00","recurringAmount":"10.00","recurringPeriodUnit":"monthly","recurringPeriodLength":"1","trialAmount":"0.00","trialPeriodUnit":"daily","trialPeriodLength":"5"}',
            stripcslashes($plan->buildRequest($plan))
        );
    }

    /**
     * Test Delete Plan JSON request
     */
    public function testDelete()
    {
        $plan = new RebillyPlan('plan123ABC');

        $this->assertEquals(
            '{"id":"plan123ABC"}',
            stripcslashes($plan->buildRequest($plan))
        );
    }
}
