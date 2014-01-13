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
        $plan                          = new RebillyPlan();
        $plan->planId                  = 'plan123ABC';
        $plan->name                    = '5 days trial';
        $plan->currency                = 'USD';
        $plan->description             = 'free 5 days trial';
        $plan->expireTime              = '2014-12-12 12:00:00';
        $plan->recurringAmount         = '10.00';
        $plan->recurringIntervalUnit   = 'monthly';
        $plan->recurringIntervalLength = '1';
        $plan->trialIntervalUnit       = 'daily';
        $plan->trialIntervalLength     = '5';
        $plan->trialAmount             = '0.00';
        $plan->setupAmount             = '10.00';

        $this->assertEquals(
            '{"planId":"plan123ABC","name":"5 days trial","currency":"USD","description":"free 5 days trial","expireTime":"2014-12-12 12:00:00","setupAmount":"10.00","recurringAmount":"10.00","recurringIntervalUnit":"monthly","recurringIntervalLength":"1","trialAmount":"0.00","trialIntervalUnit":"daily","trialIntervalLength":"5"}',
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
            '{"lookupPlanId":"plan123ABC"}',
            stripcslashes($plan->buildRequest($plan))
        );
    }
}
