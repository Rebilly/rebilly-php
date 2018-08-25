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
     *
     * @param $values
     */
    public function exceptionOnWrongValues($values)
    {
        $valuesList = new ValuesList();

        $this->expectException(DomainException::class);
        $valuesList->setValues($values);
    }

    /**
     * @test
     */
    public function addValue()
    {
        $valuesList = new ValuesList();
        self::assertNull($valuesList->getValues());

        $valuesList->addValue('test');
        self::assertContains('test', $valuesList->getValues());
    }

    /**
     * @test
     */
    public function exceptionOnWrongValue()
    {
        /** @var mixed $valuesList */
        $valuesList = new ValuesList();

        $this->expectException(DomainException::class);
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
