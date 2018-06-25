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
use Rebilly\Entities\ValuesList;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class ValuesListTest.
 */
class ValuesListTest extends BaseTestCase
{
    /**
     * @test
     * @dataProvider provideInvalidData
     * @expectedException DomainException
     *
     * @param $values
     */
    public function exceptionOnWrongValues($values)
    {
        $valuesList = new ValuesList();
        $valuesList->setValues($values);
    }

    /**
     * @test
     */
    public function addValue()
    {
        $valuesList = new ValuesList();
        $valuesList->addValue('test');
    }

    /**
     * @test
     * @expectedException DomainException
     */
    public function exceptionOnWrongValue()
    {
        $valuesList = new ValuesList();
        $valuesList->addValue([]);
    }

    /**
     * @return array
     */
    public function provideInvalidData()
    {
        return [
            'Empty values' => [
                [],
            ],
            'Single value is not a scalar value' => [
                [
                    [],
                ]
            ],
        ];
    }
}
