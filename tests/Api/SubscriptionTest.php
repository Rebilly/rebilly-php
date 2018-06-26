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
