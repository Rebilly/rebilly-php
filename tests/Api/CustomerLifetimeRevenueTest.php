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

use Rebilly\Entities\CustomerLifetimeRevenue;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class CustomerLifetimeRevenueTest.
 */
class CustomerLifetimeRevenueTest extends BaseTestCase
{
    /**
     * @test
     */
    public function lifetimeRevenue()
    {
        $resource = CustomerLifetimeRevenue::createFromData([
            'currency' => 'EUR',
            'amount' => 10.2,
            'amountUsd' => 13.1,
        ]);

        self::assertSame('EUR', $resource->getCurrency());
        self::assertSame(10.2, $resource->getAmount());
        self::assertSame(13.1, $resource->getAmountUsd());
    }
}
