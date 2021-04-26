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

declare(strict_types=1);

namespace Rebilly\Tests\Entities;

use Rebilly\Entities\Address;
use Rebilly\Entities\Contact\Email;
use Rebilly\Entities\Contact\PhoneNumber;
use Rebilly\Tests\TestCase;

final class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function buildObjectUsingSetterToSendToServer(): void
    {
        $data = self::getDefaultData();

        $address = new Address();
        $address->setFirstName($data['firstName']);
        $address->setLastName($data['lastName']);
        $address->setOrganization($data['organization']);
        $address->setAddress($data['address']);
        $address->setAddress2($data['address2']);
        $address->setCity($data['city']);
        $address->setRegion($data['region']);
        $address->setCountry($data['country']);
        $address->setPostalCode($data['postalCode']);
        $address->setPhoneNumbers(
            [
                PhoneNumber::createFromData($data['phoneNumbers'][0]),
                $data['phoneNumbers'][1],
            ]
        );
        $address->setEmails(
            [
                Email::createFromData($data['emails'][0]),
                $data['emails'][1],
            ]
        );

        self::assertSame($data, $address->jsonSerialize());
    }

    /**
     * @test
     */
    public function populateAddressFromArrayReceivedFromServer(): void
    {
        $data = self::getDefaultData();

        $address = new Address($data);

        self::assertSame($data['firstName'], $address->getFirstName());
        self::assertSame($data['lastName'], $address->getLastName());
        self::assertSame($data['organization'], $address->getOrganization());
        self::assertSame($data['address'], $address->getAddress());
        self::assertSame($data['address2'], $address->getAddress2());
        self::assertSame($data['city'], $address->getCity());
        self::assertSame($data['region'], $address->getRegion());
        self::assertSame($data['country'], $address->getCountry());
        self::assertSame($data['postalCode'], $address->getPostalCode());

        self::assertCount(2, $address->getPhoneNumbers());
        foreach ($data['phoneNumbers'] as $index => $item) {
            self::assertArrayHasKey($index, $address->getPhoneNumbers());
            self::assertInstanceOf(PhoneNumber::class, $address->getPhoneNumbers()[$index]);
            self::assertSame($item['label'], $address->getPhoneNumbers()[$index]->getLabel());
            self::assertSame($item['value'], $address->getPhoneNumbers()[$index]->getValue());
            self::assertSame($item['primary'], $address->getPhoneNumbers()[$index]->getPrimary());
        }

        self::assertCount(2, $address->getEmails());
        foreach ($data['emails'] as $index => $item) {
            self::assertArrayHasKey($index, $address->getEmails());
            self::assertInstanceOf(Email::class, $address->getEmails()[$index]);
            self::assertSame($item['label'], $address->getEmails()[$index]->getLabel());
            self::assertSame($item['value'], $address->getEmails()[$index]->getValue());
            self::assertSame($item['primary'], $address->getEmails()[$index]->getPrimary());
        }
    }

    private static function getDefaultData(): array
    {
        return [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'organization' => 'Rebilly',
            'address' => 'address 1',
            'address2' => 'address 2',
            'city' => 'Austin',
            'region' => 'Texas',
            'country' => 'US',
            'postalCode' => '12345',
            'phoneNumbers' => [
                ['label' => 'main', 'value' => '+1234', 'primary' => true],
                ['label' => 'other', 'value' => '+4567', 'primary' => false],
            ],
            'emails' => [
                ['label' => 'main', 'value' => 'main@mail.com', 'primary' => true],
                ['label' => 'other', 'value' => 'other@mail.com', 'primary' => false],
            ],
        ];
    }
}
