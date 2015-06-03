<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillySubscription;
use RebillyThreeDSecure;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyThreeDSecureTest extends TestCase
{
    /**
     * @test
     */
    public function createThreeDSecure()
    {
        $threeDSecure = new RebillyThreeDSecure();
        $threeDSecure->amount = '10.00';
        $threeDSecure->enrolled = 'Y';
        $threeDSecure->enrollmentEci = '02';
        $threeDSecure->eci = '06';
        $threeDSecure->cavv = 'BwABB3lmgFUQMCcFkWaAEEZsjO8=';
        $threeDSecure->xid = 'MTRHa0hZVjFtOHdOQjZraHRpeFI=';
        $threeDSecure->payerAuthResponseStatus = 'A';
        $threeDSecure->signatureVerification = 'Y';

        $subscription = new RebillySubscription('subscriptionId');
        $subscription->setApiKey('apiKey');
        $subscription->threeDSecure = $threeDSecure;

        $this->assertEquals(

            '{"threeDSecure":{"enrolled":"Y","enrollmentEci":"02","eci":"06","cavv":"BwABB3lmgFUQMCcFkWaAEEZsjO8=","xid":"MTRHa0hZVjFtOHdOQjZraHRpeFI=","payerAuthResponseStatus":"A","signatureVerification":"Y","amount":"10.00"},"lookupSubscriptionId":"subscriptionId"}',
            $subscription->buildRequest($subscription)
        );
    }
}
