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
     * @test
     */
    public function cancelPolicyMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancel();

        $this->expectException(DomainException::class);
        $subscriptionCancel->setPolicy('wrong');
    }

    /**
     * @test
     */
    public function cancelCategoryMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancel();

        $this->expectException(DomainException::class);
        $subscriptionCancel->setCancelCategory('wrong');
    }

    /**
     * @test
     */
    public function canceledByMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancel();

        $this->expectException(DomainException::class);
        $subscriptionCancel->setCanceledBy('wrong');
    }
}
