<?php

class RebillyMeteredBillingTest extends \Codeception\TestCase\Test
{
    public function testMeteredBillingPost()
    {
        $subscription = new RebillySubscription('subscriptionId123');
        $subscription->setApiKey('apiKey');
        $meteredBilling = new RebillyMeteredBilling();
        $meteredBilling->itemId = 'abc1';
        $meteredBilling->type = RebillyMeteredBilling::TYPE_DEBIT;
        $meteredBilling->amount = '9.99';
        $meteredBilling->quantity = 1;
        $meteredBilling->description = 'Test widget';

        $subscription->meteredBilling = array($meteredBilling);

        expect($subscription->buildRequest($subscription))
            ->equals('{"lookupSubscriptionId":"subscriptionId123","meteredBilling":[{"itemId":"abc1","type":"debit","amount":"9.99","quantity":1,"description":"Test widget"}]}');
    }
}
