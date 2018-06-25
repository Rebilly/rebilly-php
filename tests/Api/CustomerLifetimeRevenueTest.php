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
