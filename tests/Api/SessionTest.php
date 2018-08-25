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
use Rebilly\Entities\Session;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class SessionTest.
 */
class SessionTest extends BaseTestCase
{
    /**
     * @test
     * @dataProvider provideInvalidData
     *
     * @param $data
     */
    public function exceptionOnWrongPermissions($data)
    {
        $session = new Session();

        $this->expectException(DomainException::class);
        $session->setPermissions($data);
    }

    /**
     * @return array
     */
    public function provideInvalidData()
    {
        return [
            'Not an array' => [
                'wrong',
            ],
            'Single rule is not an array' => [
                [
                    'wrong',
                ]
            ],
            'Wrong resourceName' => [
                [
                    [
                        'resourceName' => 'wrong',
                        'resourceIds' => ['id123'],
                        'methods' => ['POST', 'GET'],
                    ],
                ]
            ],
            'Wrong resourceIds' => [
                [
                    [
                        'resourceName' => 'customers',
                        'resourceIds' => 'wrong',
                        'methods' => ['POST', 'GET'],
                    ],
                ]
            ],
            'Wrong method' => [
                [
                    [
                        'resourceName' => 'customers',
                        'resourceIds' => ['id123'],
                        'methods' => ['wrong'],
                    ],
                ]
            ],
            'Wrong methods' => [
                [
                    [
                        'resourceName' => 'customers',
                        'resourceIds' => ['id123'],
                        'methods' => 'wrong',
                    ],
                ]
            ],
        ];
    }
}
