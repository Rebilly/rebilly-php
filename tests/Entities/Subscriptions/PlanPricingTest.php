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

namespace Rebilly\Tests\Entities\Subscriptions;

use DomainException;
use Rebilly\Entities\Subscriptions\PlanPricing;
use Rebilly\Entities\Subscriptions\Pricing\Bracket;
use Rebilly\Entities\Subscriptions\Pricing\FixedFee;
use Rebilly\Entities\Subscriptions\Pricing\FlatRate;
use Rebilly\Entities\Subscriptions\Pricing\Stairstep;
use Rebilly\Entities\Subscriptions\Pricing\Tiered;
use Rebilly\Entities\Subscriptions\Pricing\Volume;
use Rebilly\Tests\TestCase;

final class PlanPricingTest extends TestCase
{
    /**
     * @test
     */
    public function useFixedFeePrice()
    {
        $expectedData = [
            'formula' => 'fixed-fee',
            'price' => 10.0,
        ];

        $price = new FixedFee();
        $price->setPrice(10.0);
        self::assertSame($expectedData, $price->jsonSerialize());

        $price = PlanPricing::createFromData($expectedData);
        self::assertInstanceOf(FixedFee::class, $price);
        self::assertSame($expectedData['formula'], $price->getFormula());
        self::assertSame($expectedData['price'], $price->getPrice());
    }

    /**
     * @test
     */
    public function useFlatRatePrice()
    {
        $expectedData = [
            'formula' => 'flat-rate',
            'price' => 10.0,
            'maxQuantity' => 2,
        ];

        $price = new FlatRate();
        $price->setPrice(10.0);
        $price->setMaxQuantity(2);
        self::assertSame($expectedData, $price->jsonSerialize());

        $price = PlanPricing::createFromData($expectedData);
        self::assertInstanceOf(FlatRate::class, $price);
        self::assertSame($expectedData['formula'], $price->getFormula());
        self::assertSame($expectedData['price'], $price->getPrice());
        self::assertSame($expectedData['maxQuantity'], $price->getMaxQuantity());
    }

    /**
     * @test
     */
    public function useStairstepPrice()
    {
        $expectedData = [
            'formula' => 'stairstep',
            'brackets' => [
                ['price' => 100.0, 'maxQuantity' => 2],
                ['price' => 99.0, 'maxQuantity' => null],
            ],
        ];

        $price = new Stairstep();
        $price->setBrackets(
            [
                ['price' => 100.0, 'maxQuantity' => 2],
                ['price' => 99.0, 'maxQuantity' => null],
            ]
        );
        self::assertSame($expectedData, $price->jsonSerialize());

        $price = PlanPricing::createFromData($expectedData);
        self::assertInstanceOf(Stairstep::class, $price);
        self::assertSame($expectedData['formula'], $price->getFormula());
        self::assertCount(2, $price->getBrackets());

        foreach ($price->getBrackets() as $index => $bracket) {
            self::assertInstanceOf(Bracket::class, $bracket);
            self::assertSame($expectedData['brackets'][$index]['price'], $bracket->getPrice());
            self::assertSame($expectedData['brackets'][$index]['maxQuantity'], $bracket->getMaxQuantity());
        }
    }

    /**
     * @test
     */
    public function useTieredPrice()
    {
        $expectedData = [
            'formula' => 'tiered',
            'brackets' => [
                ['price' => 10.0, 'maxQuantity' => 2],
                ['price' => 9.0, 'maxQuantity' => null],
            ],
        ];

        $price = new Tiered();
        $price->setBrackets(
            [
                ['price' => 10.0, 'maxQuantity' => 2],
                ['price' => 9.0, 'maxQuantity' => null],
            ]
        );
        self::assertSame($expectedData, $price->jsonSerialize());

        $price = PlanPricing::createFromData($expectedData);
        self::assertInstanceOf(Tiered::class, $price);
        self::assertSame($expectedData['formula'], $price->getFormula());
        self::assertCount(2, $price->getBrackets());

        foreach ($price->getBrackets() as $index => $bracket) {
            self::assertInstanceOf(Bracket::class, $bracket);
            self::assertSame($expectedData['brackets'][$index]['price'], $bracket->getPrice());
            self::assertSame($expectedData['brackets'][$index]['maxQuantity'], $bracket->getMaxQuantity());
        }
    }

    /**
     * @test
     */
    public function useVolumePrice()
    {
        $expectedData = [
            'formula' => 'volume',
            'brackets' => [
                ['price' => 10.0, 'maxQuantity' => 2],
                ['price' => 9.0, 'maxQuantity' => null],
            ],
        ];

        $price = new Volume();
        $price->setBrackets(
            [
                ['price' => 10.0, 'maxQuantity' => 2],
                ['price' => 9.0, 'maxQuantity' => null],
            ]
        );
        self::assertSame($expectedData, $price->jsonSerialize());

        $pricing = PlanPricing::createFromData($expectedData);
        self::assertInstanceOf(Volume::class, $pricing);
        self::assertSame($expectedData['formula'], $pricing->getFormula());
        self::assertCount(2, $pricing->getBrackets());

        foreach ($pricing->getBrackets() as $index => $bracket) {
            self::assertInstanceOf(Bracket::class, $bracket);
            self::assertSame($expectedData['brackets'][$index]['price'], $bracket->getPrice());
            self::assertSame($expectedData['brackets'][$index]['maxQuantity'], $bracket->getMaxQuantity());
        }
    }

    /**
     * @test
     */
    public function useBracket()
    {
        $expectedData = [
            'price' => 10.0,
            'maxQuantity' => 2,
        ];

        $bracket = new Bracket();
        $bracket->setPrice(10.0);
        $bracket->setMaxQuantity(2);
        self::assertSame($expectedData, $bracket->jsonSerialize());

        $bracket = new Bracket($expectedData);
        self::assertSame($expectedData['price'], $bracket->getPrice());
        self::assertSame($expectedData['maxQuantity'], $bracket->getMaxQuantity());
    }

    /**
     * @test
     */
    public function failOnInvalidData()
    {
        $this->setExpectedException(DomainException::class, PlanPricing::REQUIRED_FORMULA);
        PlanPricing::createFromData(
            [
                'price' => 10.0,
                'maxQuantity' => 2,
            ]
        );
    }

    /**
     * @test
     */
    public function failOnInvalidFormula()
    {
        $this->setExpectedException(
            DomainException::class,
            sprintf(PlanPricing::UNSUPPORTED_FORMULA, implode(',', PlanPricing::getAvailableFormulas()))
        );
        PlanPricing::createFromData(
            [
                'formula' => 'unknown',
            ]
        );
    }
}
