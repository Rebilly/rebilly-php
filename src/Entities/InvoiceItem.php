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
use Rebilly\Rest\Entity;

/**
 * Class InvoiceItem.
 */
final class InvoiceItem extends Entity
{
    public const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

    public const TYPE_CREDIT = 'credit';

    public const TYPE_DEBIT = 'debit';

    /**
     * @return array
     */
    public static function types()
    {
        return [self::TYPE_CREDIT, self::TYPE_DEBIT];
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     * @return $this
     */
    public function setType($value)
    {
        if (!in_array($value, self::types(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::types())));
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->getAttribute('unitPrice');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setUnitPrice($value)
    {
        return $this->setAttribute('unitPrice', $value);
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
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', (int) $value);
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
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
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
     * @return $this
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
     * @return $this
     */
    public function setPeriodEndTime($value)
    {
        return $this->setAttribute('periodEndTime', $value);
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->getAttribute('productId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setProductId($value)
    {
        return $this->setAttribute('productId', $value);
    }
}
