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

use Rebilly\Entities\Contact;
use Rebilly\Rest\Collection;

/**
 * Class ContactTest.
 *
 */
class ContactTest extends TestCase
{
    /**
     * @test
     */
    public function searchTheContactTests()
    {
        $client = $this->getClient();

        $contacts = $client->contacts()->search();

        $this->assertInstanceOf(Collection::class, $contacts);
        $this->assertGreaterThan(0, count($contacts));

        return $contacts[0];
    }

    /**
     * @test
     */
    public function createTheCustomer()
    {
        $faker = $this->getFaker();
        $client = $this->getClient();

        $form = new Contact();
        $form->setFirstName($faker->firstName);
        $form->setLastName($faker->lastName);

        $contact = $client->contacts()->create($form);

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertSame($form->getFirstName(), $contact->getFirstName());
    }
}
