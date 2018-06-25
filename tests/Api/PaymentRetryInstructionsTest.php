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
        $instruction = new DiscountType();
        $instruction->setValue(15);
        $instruction->setType('discount');

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
        $instruction = new NoneType();

        self::assertInstanceOf(NoneType::class, $instruction);
        self::assertSame('none', $instruction->getMethod());
    }

    /**
     * @test
     */
    public function partialType()
    {
        $instruction = new PartialType();
        $instruction->setType('partial');
        $instruction->setValue(15);

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
        $instruction = new AutoType();

        self::assertInstanceOf(AutoType::class, $instruction);
        self::assertSame('auto', $instruction->getMethod());
    }

    /**
     * @test
     */
    public function scheduleDateIntervalType()
    {
        $instruction = new DateIntervalType();
        $instruction->setDuration(1);
        $instruction->setUnit('day');

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
        $instruction = new DayOfMonthType();
        $instruction->setDay(1);
        $instruction->setTime('22:11:00');

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
        $instruction = new DayOfWeekType();
        $instruction->setTime('22:11:00');
        $instruction->setWeek('next');
        $instruction->setDay('Monday');

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
        $instruction = new ImmediatelyType();

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
