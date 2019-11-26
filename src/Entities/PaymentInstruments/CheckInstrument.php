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

class CheckInstrument extends PaymentMethodInstrument
{
    /**
     * @return string
     */
    public function getReference()
    {
        return $this->getAttribute('reference');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReference($value)
    {
        return $this->setAttribute('reference', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentMethod::METHOD_CHECK;
    }
}
