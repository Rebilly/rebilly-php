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
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\DiscountType;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\NoneType;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\PartialType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\AutoType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DateIntervalType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DayOfMonthType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DayOfWeekType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\ImmediatelyType;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class PaymentRetryInstructionsTest.
 */
class PaymentRetryInstructionsTest extends BaseTestCase
{
    /**
     * @test
     */
    public function discountType()
    {
        /**
         * @var DiscountType $instruction
         */
        $instruction = DiscountType::createFromData([
            'method' => 'discount',
            'type' => 'discount',
            'value' => 15,
        ]);

        self::assertInstanceOf(DiscountType::class, $instruction);
        self::assertSame(15, $instruction->getValue());
        self::assertSame('discount', $instruction->getType());
        self::assertSame('discount', $instruction->getMethod());
    }

    /**
     * @test
     */
    public function noneType()
    {
        /**
         * @var NoneType $instruction
         */
        $instruction = NoneType::createFromData([
            'method' => 'none',
        ]);

        self::assertInstanceOf(NoneType::class, $instruction);
        self::assertSame('none', $instruction->getMethod());
    }

    /**
     * @test
     */
    public function partialType()
    {
        /**
         * @var PartialType $instruction
         */
        $instruction = PartialType::createFromData([
            'method' => 'partial',
            'type' => 'partial',
            'value' => 15,
        ]);

        self::assertInstanceOf(PartialType::class, $instruction);
        self::assertSame(15, $instruction->getValue());
        self::assertSame('partial', $instruction->getType());
        self::assertSame('partial', $instruction->getMethod());
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function paymentMethodIsRequired()
    {
        PartialType::createFromData([]);
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function paymentMethodMustBeCorrect()
    {
        PartialType::createFromData([
            'method' => 'wrong',
        ]);
    }

    /**
     * @test
     */
    public function scheduleAutoType()
    {
        /**
         * @var AutoType $instruction
         */
        $instruction = AutoType::createFromData([
            'method' => 'auto',
        ]);

        self::assertInstanceOf(AutoType::class, $instruction);
        self::assertSame('auto', $instruction->getMethod());
    }

    /**
     * @test
     */
    public function scheduleDateIntervalType()
    {
        /**
         * @var DateIntervalType $instruction
         */
        $instruction = DateIntervalType::createFromData([
            'method' => 'date-interval',
            'duration' => 1,
            'unit' => 'day',
        ]);

        self::assertInstanceOf(DateIntervalType::class, $instruction);
        self::assertSame('date-interval', $instruction->getMethod());
        self::assertSame(1, $instruction->getDuration());
        self::assertSame('day', $instruction->getUnit());
    }

    /**
     * @test
     */
    public function scheduleDayOfMonthType()
    {
        /**
         * @var DayOfMonthType $instruction
         */
        $instruction = DayOfMonthType::createFromData([
            'method' => 'day-of-month',
            'day' => 1,
            'time' => '22:11:00',
        ]);

        self::assertInstanceOf(DayOfMonthType::class, $instruction);
        self::assertSame('day-of-month', $instruction->getMethod());
        self::assertSame(1, $instruction->getDay());
        self::assertSame('22:11:00', $instruction->getTime());
    }

    /**
     * @test
     */
    public function scheduleDayOfWeekType()
    {
        /**
         * @var DayOfWeekType $instruction
         */
        $instruction = DayOfWeekType::createFromData([
            'method' => 'day-of-week',
            'week' => 'next',
            'day' => 'Monday',
            'time' => '22:11:00',
        ]);

        self::assertInstanceOf(DayOfWeekType::class, $instruction);
        self::assertSame('day-of-week', $instruction->getMethod());
        self::assertSame('next', $instruction->getWeek());
        self::assertSame('Monday', $instruction->getDay());
        self::assertSame('22:11:00', $instruction->getTime());
    }

    /**
     * @test
     */
    public function scheduleImmediatelyType()
    {
        /**
         * @var ImmediatelyType $instruction
         */
        $instruction = ImmediatelyType::createFromData([
            'method' => 'immediately',
        ]);

        self::assertInstanceOf(ImmediatelyType::class, $instruction);
        self::assertSame('immediately', $instruction->getMethod());
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function scheduleMethodIsRequired()
    {
        AutoType::createFromData([]);
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function scheduleMethodMustBeCorrect()
    {
        AutoType::createFromData([
            'method' => 'wrong',
        ]);
    }
}
