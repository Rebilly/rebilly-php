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
                ],
            ],
        ];
    }
}
