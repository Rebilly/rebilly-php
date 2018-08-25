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
use Rebilly\Entities\SubscriptionCancel;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class SubscriptionTest.
 */
class SubscriptionTest extends BaseTestCase
{
    /**
     * @expectedException DomainException
     * @test
     */
    public function cancelPolicyMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancel();
        $subscriptionCancel->setPolicy('wrong');
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function cancelCategoryMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancel();
        $subscriptionCancel->setCancelCategory('wrong');
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function canceledByMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancel();
        $subscriptionCancel->setCanceledBy('wrong');
    }
}
