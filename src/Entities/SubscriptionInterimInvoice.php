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

use Rebilly\Rest\Resource;

class SubscriptionInterimInvoice extends Resource
{
    /**
     * @param $value
     */
    public function setTransactionId($value)
    {
        $this->setAttribute('transactionId', $value);
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->getAttribute('transactionId');
    }
}
