<?php
class RebillyThreeDSecureTest extends \Codeception\TestCase\Test
{
    public function testCreateThreeDSecure()
    {
        $subscription = new RebillySubscription('subscriptionId');
        $subscription->setApiKey('apiKey');
        $threeDSecure = new RebillyThreeDSecure();
        $threeDSecure->amount = '10.00';
        $threeDSecure->enrolled = 'Y';
        $threeDSecure->enrollmentEci = '02';
        $threeDSecure->eci = '06';
        $threeDSecure->cavv = 'BwABB3lmgFUQMCcFkWaAEEZsjO8=';
        $threeDSecure->xid = 'MTRHa0hZVjFtOHdOQjZraHRpeFI=';
        $threeDSecure->payerAuthResponseStatus = 'A';
        $threeDSecure->signatureVerification = 'Y';

        $subscription->threeDSecure = $threeDSecure;

        expect($subscription->buildRequest($subscription))
            ->equals('{"threeDSecure":{"enrolled":"Y","enrollmentEci":"02","eci":"06","cavv":"BwABB3lmgFUQMCcFkWaAEEZsjO8=","xid":"MTRHa0hZVjFtOHdOQjZraHRpeFI=","payerAuthResponseStatus":"A","signatureVerification":"Y","amount":"10.00"},"lookupSubscriptionId":"subscriptionId"}');
    }
}
