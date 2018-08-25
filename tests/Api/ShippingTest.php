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
use Rebilly\Entities\Shipping\Rate;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class ShippingTest.
 */
class ShippingTest extends BaseTestCase
{
    /**
     * @test
     */
    public function rate()
    {
        $rate = new Rate();
        $rate->setMinOrderSubtotal(1);
        $rate->setMaxOrderSubtotal(10);
        $rate->setCurrency('USD');
        $rate->setName('test name');
        $rate->setPrice(1.2);

        self::assertInstanceOf(Rate::class, $rate);
        self::assertSame(1, $rate->getMinOrderSubtotal());
        self::assertSame(10, $rate->getMaxOrderSubtotal());
        self::assertSame(1.2, $rate->getPrice());
        self::assertSame('USD', $rate->getCurrency());
        self::assertSame('test name', $rate->getName());
    }

    /**
     * @test
     * @dataProvider provideInvalidData
     *
     * @param $data
     */
    public function exceptionOnWrongRequiredField($data)
    {
        $this->expectException(DomainException::class);
        Rate::createFromData($data);
    }

    /**
     * @return array
     */
    public function provideInvalidData()
    {
        return [
            'Empty name' => [
                [
                    'price' => 1.2,
                    'currency' => 'USD',
                ]
            ],
            'Empty price' => [
                [
                    'name' => 'test name',
                    'currency' => 'USD',
                ]
            ],
            'Empty currency' => [
                [
                    'name' => 'test name',
                    'price' => 1.2,
                ]
            ],
        ];
    }
}
