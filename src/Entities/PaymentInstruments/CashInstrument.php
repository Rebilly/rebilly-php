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

namespace Rebilly\Entities\PaymentInstruments;

use Rebilly\Entities\PaymentMethod;
use Rebilly\Entities\PaymentMethodInstrument;

/**
 * Class CashInstrument
 *
 */
class CashInstrument extends PaymentMethodInstrument
{
    /**
     * @return string
     */
    public function getReceivedBy()
    {
        return $this->getAttribute('receivedBy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReceivedBy($value)
    {
        return $this->setAttribute('receivedBy', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentMethod::METHOD_CASH;
    }
}
