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

use InvalidArgumentException;
use Rebilly\Entities\PaymentCardMigrationsResponse;
use Rebilly\Entities\PaymentInstruments\AchInstrument;
use Rebilly\Entities\PaymentInstruments\AlternativeInstrument;
use Rebilly\Entities\PaymentInstruments\CashInstrument;
use Rebilly\Entities\PaymentInstruments\CheckInstrument;
use Rebilly\Entities\PaymentInstruments\PaymentCardInstrument;
use Rebilly\Entities\PaymentInstruments\PaymentCardPaymentInstrument;
use Rebilly\Entities\PaymentInstruments\PayPalInstrument;
use Rebilly\Entities\PaymentMethod;
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
    public function checkInstrument()
    {
        $instrument = new CheckInstrument();
        $instrument->setReference('#123');

        self::assertInstanceOf(CheckInstrument::class, $instrument);
        self::assertSame('#123', $instrument->getReference());
        self::assertSame('check', $instrument->getMethod());
    }

    /**
     * @test
     */
    public function alternativeInstrument()
    {
        $instrument = new AlternativeInstrument(['method' => PaymentMethod::METHOD_IDEAL]);

        self::assertInstanceOf(AlternativeInstrument::class, $instrument);
        self::assertSame('iDEAL', $instrument->getMethod());
    }

    /**
     * @test
     */
    public function methodIsRequiredWhenCreatingAlternativeInstrument()
    {
        $this->expectException(InvalidArgumentException::class);

        new AlternativeInstrument();
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
        self::assertSame('payment-card', $instrument->name());
        self::assertSame(11, $instrument->getExpMonth());
        self::assertSame(date('Y') + 1, $instrument->getExpYear());
        self::assertFalse(method_exists($instrument, 'getCvv'));
        self::assertFalse(method_exists($instrument, 'getPan'));
    }

    /**
     * @test
     */
    public function methodIsRequired()
    {
        $this->expectException(InvalidArgumentException::class);
        PaymentMethodInstrument::createFromData([]);
    }

    /**
     * @test
     * @dataProvider providePaymentInstructions
     * @param mixed $data
     */
    public function paymentInstructionsCreateFromData($data)
    {
        $value = PaymentMethodInstrument::createFromData($data);
        self::assertInstanceOf(PaymentMethodInstrument::class, $value);
        self::assertSame($data, $value->jsonSerialize());
    }

    /**
     * @test
     */
    public function paymentCardMigrationsResponse()
    {
        $response = new PaymentCardMigrationsResponse([
            'migratedCards' => 2,
        ]);

        self::assertInstanceOf(PaymentCardMigrationsResponse::class, $response);
        self::assertSame(2, $response->getMigratedCards());
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
