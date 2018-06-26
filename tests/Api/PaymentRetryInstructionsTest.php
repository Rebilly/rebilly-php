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
use Rebilly\Entities\PaymentRetryAttempt;
use Rebilly\Entities\PaymentRetryInstruction;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\DiscountType;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\NoneType;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes\PartialType;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
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
    public function paymentInstructionsDiscountType()
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
    public function paymentInstructionsNoneType()
    {
        $instruction = new NoneType();

        self::assertInstanceOf(NoneType::class, $instruction);
        self::assertSame('none', $instruction->getMethod());
    }

    /**
     * @test
     */
    public function paymentInstructionsPartialType()
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
    public function paymentInstructionsMethodIsRequired()
    {
        PartialType::createFromData([]);
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function paymentInstructionsMethodMustBeCorrect()
    {
        PartialType::createFromData([
            'method' => 'wrong',
        ]);
    }

    /**
     * @test
     * @dataProvider providePaymentInstructions
     */
    public function paymentInstructionsCreateFromData($data)
    {
        PaymentInstruction::createFromData($data);
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

    /**
     * @test
     * @dataProvider provideScheduleInstructions
     */
    public function scheduleInstructionsCreateFromData($data)
    {
        ScheduleInstruction::createFromData($data);
    }

    /**
     * @test
     */
    public function paymentRetryInstruction()
    {
        $attempt = new PaymentRetryAttempt([
            'scheduleInstruction' => ScheduleInstruction::createFromData([
                'method' => 'auto',
            ]),
        ]);
        $attempt->setScheduleInstruction(ScheduleInstruction::createFromData([
            'method' => 'auto',
        ]));
        $attempt->setPaymentInstruction(PaymentInstruction::createFromData([
            'method' => 'none',
        ]));

        $instruction = new PaymentRetryInstruction();
        $instruction->setAttempts([$attempt]);
        $instruction->setAfterAttemptPolicy(PaymentRetryInstruction::AFTER_ATTEMPT_POLICY_NONE);
        $instruction->setAfterRetryEndPolicy(PaymentRetryInstruction::AFTER_RETRY_END_POLICY_CANCEL_SUBSCRIPTION);

        self::assertSame(PaymentRetryInstruction::AFTER_ATTEMPT_POLICY_NONE, $instruction->getAfterAttemptPolicy());
        self::assertSame(PaymentRetryInstruction::AFTER_RETRY_END_POLICY_CANCEL_SUBSCRIPTION, $instruction->getAfterRetryEndPolicy());
        self::assertEquals([$attempt], $instruction->getAttempts());
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function attemptMustBeArray()
    {
        $instruction = new PaymentRetryInstruction();
        $instruction->addAttempt('wrong');
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function afterAttemptPolicyMustBeCorrect()
    {
        $instruction = new PaymentRetryInstruction();
        $instruction->setAfterAttemptPolicy('wrong');
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function afterRetryEndPolicyMustBeCorrect()
    {
        $instruction = new PaymentRetryInstruction();
        $instruction->setAfterRetryEndPolicy('wrong');
    }

    /**
     * @test
     */
    public function createPaymentRetryAttempt()
    {
        $instruction = new PaymentRetryInstruction();
        $attempt = $instruction->createPaymentRetryAttempt([
            'scheduleInstruction' => ScheduleInstruction::createFromData([
                'method' => 'auto',
            ]),
        ]);

        self::assertInstanceOf(PaymentRetryAttempt::class, $attempt);
    }

    /**
     * @return array
     */
    public function providePaymentInstructions()
    {
        return [
            [
                [
                    'method' => 'discount',
                    'value' => 1,
                ],
            ],
            [
                [
                    'method' => 'none',
                ],
            ],
            [
                [
                    'method' => 'partial',
                    'value' => 1,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideScheduleInstructions()
    {
        return [
            [
                [
                    'method' => 'auto',
                ],
            ],
            [
                [
                    'method' => 'date-interval',
                ],
            ],
            [
                [
                    'method' => 'day-of-month',
                ],
            ],
            [
                [
                    'method' => 'day-of-week',
                ],
            ],
            [
                [
                    'method' => 'immediately',
                ],
            ],
        ];
    }
}
