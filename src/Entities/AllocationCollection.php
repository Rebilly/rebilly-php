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
     * @param array $data
     *
     * @return AllocationCollection
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }

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
     * @param array $data
     *
     * @return array|TransactionAllocation[]
     */
    public function createTransactions(array $data)
    {
        return array_map(function ($element) {
            return new TransactionAllocation($element);
        }, $data);
    }
}
