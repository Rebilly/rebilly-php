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
use Rebilly\Entities\PaymentInstruments\AchInstrument;
use Rebilly\Entities\PaymentInstruments\CashInstrument;
use Rebilly\Entities\PaymentInstruments\PaymentCardInstrument;
use Rebilly\Entities\PaymentInstruments\PaymentCardPaymentInstrument;
use Rebilly\Entities\PaymentInstruments\PayPalInstrument;
use Rebilly\Entities\PaymentMethodInstrument;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class PaymentInstrumentsTest.
 */
class PaymentInstrumentsTest extends BaseTestCase
{
    /**
     * @test
     */
    public function achInstrument()
    {
        $instrument = new AchInstrument();
        $instrument->setBankAccountId('123');
        $instrument->setGatewayAccountId('gateway-1');

        self::assertInstanceOf(AchInstrument::class, $instrument);
        self::assertSame('123', $instrument->getBankAccountId());
        self::assertSame('gateway-1', $instrument->getGatewayAccountId());
        self::assertSame('ach', $instrument->getMethod());
    }

    /**
     * @test
     */
    public function paypalInstrument()
    {
        $instrument = new PayPalInstrument();
        $instrument->setPayPalAccountId('123');
        $instrument->setGatewayAccountId('gateway-1');

        self::assertInstanceOf(PayPalInstrument::class, $instrument);
        self::assertSame('123', $instrument->getPayPalAccountId());
        self::assertSame('gateway-1', $instrument->getGatewayAccountId());
        self::assertSame('paypal', $instrument->getMethod());
    }

    /**
     * @test
     */
    public function paymentCardInstrument()
    {
        $instrument = new PaymentCardInstrument();
        $instrument->setPaymentCardId('123');
        $instrument->setGatewayAccountId('gateway-1');

        self::assertInstanceOf(PaymentCardInstrument::class, $instrument);
        self::assertSame('123', $instrument->getPaymentCardId());
        self::assertSame('gateway-1', $instrument->getGatewayAccountId());
        self::assertSame('payment-card', $instrument->getMethod());
    }

    /**
     * @test
     */
    public function cashInstrument()
    {
        $instrument = new CashInstrument();
        $instrument->setReceivedBy('123');

        self::assertInstanceOf(CashInstrument::class, $instrument);
        self::assertSame('123', $instrument->getReceivedBy());
        self::assertSame('cash', $instrument->getMethod());
    }

    /**
     * @test
     */
    public function paymentCardPaymentInstrument()
    {
        $instrument = new PaymentCardPaymentInstrument();
        $instrument->setCvv('123');
        $instrument->setExpMonth(11);
        $instrument->setExpYear(date('Y') + 1);
        $instrument->setPan('4111111111111111');

        self::assertInstanceOf(PaymentCardPaymentInstrument::class, $instrument);
        self::assertSame(11, $instrument->getExpMonth());
        self::assertSame(date('Y') + 1, $instrument->getExpYear());
        self::assertFalse(method_exists($instrument, 'getCvv'));
        self::assertFalse(method_exists($instrument, 'getPan'));
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function methodIsRequired()
    {
        PaymentMethodInstrument::createFromData([]);
    }

    /**
     * @expectedException DomainException
     * @test
     */
    public function paymentInstructionsMethodMustBeCorrect()
    {
        PaymentMethodInstrument::createFromData([
            'method' => 'wrong',
        ]);
    }

    /**
     * @test
     * @dataProvider providePaymentInstructions
     */
    public function paymentInstructionsCreateFromData($data)
    {
        PaymentMethodInstrument::createFromData($data);
    }

    /**
     * @return array
     */
    public function providePaymentInstructions()
    {
        return [
            [
                [
                    'method' => 'ach',
                ],
            ],
            [
                [
                    'method' => 'paypal',
                ],
            ],
            [
                [
                    'method' => 'payment-card',
                ],
            ],
            [
                [
                    'method' => 'cash',
                ],
            ],
        ];
    }
}
