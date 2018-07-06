<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
