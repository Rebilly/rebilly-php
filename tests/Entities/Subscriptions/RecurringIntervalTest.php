<?php

namespace Rebilly\Tests\Entities\Subscriptions;

use Rebilly\Entities\Subscriptions\RecurringInterval;
use Rebilly\Tests\TestCase;

class RecurringIntervalTest extends TestCase
{
    /**
     * @test
     */
    public function useRecurringInterval()
    {
        $expectedData = [
            'unit' => 'month',
            'length' => 1,
            'limit' => 12,
        ];

        $recurringInterval = new RecurringInterval();
        $recurringInterval->setUnit('month');
        $recurringInterval->setLength(1);
        $recurringInterval->setLimit(12);
        self::assertSame($expectedData, $recurringInterval->jsonSerialize());

        $recurringInterval = new RecurringInterval($expectedData);
        self::assertSame($expectedData['unit'], $recurringInterval->getUnit());
        self::assertSame($expectedData['length'], $recurringInterval->getLength());
        self::assertSame($expectedData['limit'], $recurringInterval->getLimit());
    }
}
