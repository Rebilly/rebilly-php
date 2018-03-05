<?php

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
