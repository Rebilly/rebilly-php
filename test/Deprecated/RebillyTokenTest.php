<?php
/**
 * This file is part of Rebilly.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Deprecated;

use RebillyToken;
use Rebilly\Test\TestCase;

/**
 * Class RebillyTokenTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
final class RebillyTokenTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideValues
     *
     * @param array $attributes
     */
    public function createTokenMinimalJson(array $attributes)
    {
        $token = new RebillyToken();

        foreach ($attributes as $key => $value) {
            $token->$key = $value;
        }

        $this->assertEquals($token->buildRequest($token), json_encode($attributes));
    }

    /**
     * @return array[][]
     */
    public function provideValues()
    {
        return [
            'minimal' => [
                [
                    'pan' => '4111111111111111',
                    'expMonth' => '10',
                    'expYear' => '2018',
                    'firstName' => 'MyFirst',
                    'lastName' => 'thelast',
                ],
            ],
            'full' => [
                [
                    'pan' => '4111111111111111',
                    'expMonth' => '10',
                    'expYear' => '2018',
                    'cvv' => '123',
                    'firstName' => 'MyFirst',
                    'lastName' => 'thelast',
                    'address' => '2020 Main Street',
                    'address2' => '#555',
                    'city' => 'Montreal',
                    'region' => 'Quebec',
                    'country' => 'CA',
                    'phoneNumber' => '555-555-5555',
                    'postalCode' => 'H1A 2T9',
                ],
            ],
        ];
    }
}
