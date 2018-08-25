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
                ],
            ],
            'Wrong resourceName' => [
                [
                    [
                        'resourceName' => 'wrong',
                        'resourceIds' => ['id123'],
                        'methods' => ['POST', 'GET'],
                    ],
                ],
            ],
            'Wrong resourceIds' => [
                [
                    [
                        'resourceName' => 'customers',
                        'resourceIds' => 'wrong',
                        'methods' => ['POST', 'GET'],
                    ],
                ],
            ],
            'Wrong method' => [
                [
                    [
                        'resourceName' => 'customers',
                        'resourceIds' => ['id123'],
                        'methods' => ['wrong'],
                    ],
                ],
            ],
            'Wrong methods' => [
                [
                    [
                        'resourceName' => 'customers',
                        'resourceIds' => ['id123'],
                        'methods' => 'wrong',
                    ],
                ],
            ],
        ];
    }
}
