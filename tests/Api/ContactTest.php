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

use Rebilly\Entities\Contact;
use Rebilly\Rest\Collection;

/**
 * Class ContactTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
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
        $this->assertEquals($form->getFirstName(), $contact->getFirstName());
    }
}
