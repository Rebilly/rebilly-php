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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class InvoiceTax.
 */
final class InvoiceTax extends Resource
{
    public const UNEXPECTED_CALCULATOR = 'Unexpected calculator. Only %s calculators are supported';

    public const CALCULATOR_MANUAL = 'manual';

    public const CALCULATOR_REBILLY_TAXJAR = 'rebilly-taxjar';

    /**
     * @return array
     */
    public static function allowedCalculators()
    {
        return [
            self::CALCULATOR_MANUAL,
            self::CALCULATOR_REBILLY_TAXJAR,
        ];
    }

    /**
     * @return string
     */
    public function getCalculator()
    {
        return $this->getAttribute('calculator');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCalculator($value): self
    {
        if (!in_array($value, self::allowedCalculators(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_CALCULATOR, implode(', ', self::allowedCalculators())));
        }

        return $this->setAttribute('calculator', $value);
    }

    /**
     * @deprecated
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @deprecated
     *
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @deprecated
     *
     * @param float $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return array|InvoiceTaxItem[]
     */
    public function getItems()
    {
        return $this->getAttribute('items');
    }

    /**
     * @param array|InvoiceTaxItem[] $value
     *
     * @return $this
     */
    public function setItems($value)
    {
        return $this->setAttribute('items', $value);
    }

    /**
     * @param array $data
     *
     * @return array|InvoiceItem[]
     */
    public function createItems(array $data)
    {
        return array_map(function ($element) {
            if ($element instanceof InvoiceTaxItem) {
                return $element;
            }

            return new InvoiceTaxItem($element);
        }, $data);
    }
}
