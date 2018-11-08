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

use Rebilly\Entities\Address;
use Rebilly\Entities\Contact\Email;
use Rebilly\Entities\Contact\PhoneNumber;
use Rebilly\Entities\Customer;
use Rebilly\Entities\PaymentInstruments\PaymentCardInstrument;
use Rebilly\Tests\TestCase as BaseTestCase;

class CustomerEntityTest extends BaseTestCase
{
    public function testEntity()
    {
        $customer = new Customer();
        $customer->setPrimaryAddress([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'phoneNumbers' => [
                PhoneNumber::createFromData([
                    'primary' => true,
                    'value' => '+1234567890',
                    'label' => 'main',
                ]),
            ],
            'emails' => [
                Email::createFromData([
                    'primary' => true,
                    'value' => 'test@mail.com',
                    'label' => 'main',
                ]),
            ],
        ]);
        $customer->setCustomFields([
            'foo' => 'bar',
        ]);
        $customer->setDefaultPaymentInstrument(new PaymentCardInstrument([
            'paymentCardId' => 'card-1',
        ]));

        self::assertSame('John', $customer->getPrimaryAddress()->getFirstName());
        self::assertSame('Doe', $customer->getPrimaryAddress()->getLastName());
        self::assertCount(1, $customer->getPrimaryAddress()->getPhoneNumbers());
        self::assertSame('+1234567890', $customer->getPrimaryAddress()->getPhoneNumbers()[0]->getValue());
        self::assertSame('main', $customer->getPrimaryAddress()->getPhoneNumbers()[0]->getLabel());
        self::assertSame(true, $customer->getPrimaryAddress()->getPhoneNumbers()[0]->getPrimary());
        self::assertCount(1, $customer->getPrimaryAddress()->getEmails());
        self::assertSame('test@mail.com', $customer->getPrimaryAddress()->getEmails()[0]->getValue());
        self::assertSame('main', $customer->getPrimaryAddress()->getEmails()[0]->getLabel());
        self::assertSame(true, $customer->getPrimaryAddress()->getEmails()[0]->getPrimary());
        self::assertCount(1, $customer->getCustomFields());
        self::assertSame('bar', $customer->getCustomFields()['foo']);
        self::assertSame(null, $customer->getLifetimeRevenue());
    }

    public function testDeprecatedMethods()
    {
        $customer = new Customer();
        $customer->setEmail('test@mail.com');
        $customer->setFirstName('John');
        $customer->setLastName('Doe');

        $customer->setPrimaryAddress(Address::createFromData([
            'country' => 'US',
        ]));

        self::assertSame('test@mail.com', $customer->getEmail());
        self::assertSame('John', $customer->getFirstName());
        self::assertSame('Doe', $customer->getLastName());
        self::assertCount(1, $customer->getPrimaryAddress()->getEmails());
        self::assertSame('test@mail.com', $customer->getPrimaryAddress()->getEmails()[0]->getValue());
        self::assertSame('John', $customer->getPrimaryAddress()->getFirstName());
        self::assertSame('Doe', $customer->getPrimaryAddress()->getLastName());
    }
}
