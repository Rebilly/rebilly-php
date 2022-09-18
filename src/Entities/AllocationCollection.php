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

use Rebilly\Rest\Entity;

/**
 * Class AllocationCollection.
 */
final class AllocationCollection extends Entity
{
    /**
     * @return TransactionAllocation[]
     */
    public function getTransactions()
    {
        return $this->getAttribute('transactions');
    }

    /**
     * @param TransactionAllocation[] $value
     *
     * @return $this
     */
    public function setTransactions($value)
    {
        return $this->setAttribute('transactions', $value);
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
        return $this->setAttribute('quantity', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceItemId()
    {
        return $this->getAttribute('invoiceItemId');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setInvoiceItemId($value)
    {
        return $this->setAttribute('invoiceItemId', $value);
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
     * @return float
     */
    public function getPrice()
    {
        return $this->getAttribute('price');
    }

    /**
     * @return string|null
     */
    public function getProductId()
    {
        return $this->getAttribute('productId');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setProductId($value)
    {
        return $this->setAttribute('productId', $value);
    }

    /**
     * @return string|null
     */
    public function getPlanId()
    {
        return $this->getAttribute('planId');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setPlanId($value)
    {
        return $this->setAttribute('planId', $value);
    }
}
