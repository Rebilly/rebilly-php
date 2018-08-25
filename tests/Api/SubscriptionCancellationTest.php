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

namespace Rebilly\Tests\Api;

use DomainException;
use Rebilly\Entities\SubscriptionCancellation;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class SubscriptionTest.
 */
class SubscriptionCancellationTest extends BaseTestCase
{
    /**
     * @expectedException DomainException
     * @test
     */
    public function cancelStatusMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancellation();
        $subscriptionCancel->setStatus('wrong');
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function cancelCategoryMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancellation();
        $subscriptionCancel->setReason('wrong');
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function canceledByMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancellation();
        $subscriptionCancel->setCanceledBy('wrong');
    }
}
