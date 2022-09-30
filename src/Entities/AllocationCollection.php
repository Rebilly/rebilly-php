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
}
