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
