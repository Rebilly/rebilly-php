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

class PaymentCardValidation extends PaymentInstrumentValidation
{
    /**
     * @return string
     */
    public function getAvsResult()
    {
        return $this->getAttribute('avsResult');
    }

    /**
     * @return string
     */
    public function getCvvResult()
    {
        return $this->getAttribute('cvvResult');
    }

    /**
     * @return int
     */
    public function getExpYear()
    {
        return $this->getAttribute('expYear');
    }

    /**
     * @return int
     */
    public function getExpMonth()
    {
        return $this->getAttribute('expMonth');
    }
}
