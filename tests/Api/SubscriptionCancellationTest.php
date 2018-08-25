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
     * @test
     */
    public function cancelStatusMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancellation();

        $this->expectException(DomainException::class);
        $subscriptionCancel->setStatus('wrong');
    }

    /**
     * @test
     */
    public function cancelCategoryMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancellation();

        $this->expectException(DomainException::class);
        $subscriptionCancel->setReason('wrong');
    }

    /**
     * @test
     */
    public function canceledByMustBeCorrect()
    {
        $subscriptionCancel = new SubscriptionCancellation();

        $this->expectException(DomainException::class);
        $subscriptionCancel->setCanceledBy('wrong');
    }
}
