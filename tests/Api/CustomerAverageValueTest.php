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

use Rebilly\Entities\CustomerAverageValue;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class CustomerAverageValueTest.
 */
class CustomerAverageValueTest extends BaseTestCase
{
    /**
     * @test
     */
    public function averageValue()
    {
        $resource = CustomerAverageValue::createFromData([
            'currency' => 'EUR',
            'amount' => 0.1,
            'amountUsd' => 0.01,
        ]);

        self::assertSame('EUR', $resource->getCurrency());
        self::assertSame(0.1, $resource->getAmount());
        self::assertSame(0.01, $resource->getAmountUsd());
    }
}
