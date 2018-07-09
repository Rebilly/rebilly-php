<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;


use DomainException;
use Rebilly\Rest\Resource;

class LineItem extends Resource
{
    const UNEXPECTED_TYPE = 'Unexpected cancel category. Only %s categories are supported';

    const TYPE_CREDIT = 'credit';

    const TYPE_DEBIT = 'debit';

    public static function types()
    {
        return [self::TYPE_CREDIT, self::TYPE_DEBIT];
    }

    /**
     * @param $value
     *
     * @return LineItem
     */
    public function setType($value)
    {
        if (!in_array($value, self::types())) {
            throw new DomainException(sprintf(self::UNEXPECTED_TYPE, implode(', ', self::types())));
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @param float $value
     *
     * @return LineItem
     */
    public function setUnitPriceAmount($value)
    {
        return $this->setAttribute('unitPriceAmount', $value);
    }

    /**
     * @return float
     */
    public function getUnitPriceAmount()
    {
        return $this->getAttribute('unitPriceAmount');
    }

    /**
     * @return string
     */
    public function getUnitPriceCurrency()
    {
        return $this->getAttribute('unitPriceCurrency');
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setUnitPriceCurrency($value)
    {
        return $this->setAttribute('unitPriceCurrency', $value);
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getAttribute('quantity');
    }

    /**
     * @param int $value
     *
     * @return LineItem
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', $value);
    }

    /**
     * @return string
     */
    public function getPeriodStartTime()
    {
        return $this->getAttribute('periodStartTime');
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setPeriodStartTime($value)
    {
        return $this->setAttribute('periodStartTime', $value);
    }

    /**
     * @return string
     */
    public function getPeriodEndTime()
    {
        return $this->getAttribute('periodEndTime');
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setPeriodEndTime($value)
    {
        return $this->setAttribute('periodEndTime', $value);
    }
}
