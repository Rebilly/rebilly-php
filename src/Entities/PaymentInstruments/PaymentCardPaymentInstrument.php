<?php

namespace Rebilly\Entities\PaymentInstruments;

use Rebilly\Entities\PaymentInstrument;
use Rebilly\Entities\PaymentMethod;

class PaymentCardPaymentInstrument extends PaymentInstrument
{
    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return PaymentMethod::METHOD_PAYMENT_CARD;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPan($value)
    {
        return $this->setAttribute('pan', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCvv($value)
    {
        return $this->setAttribute('cvv', $value);
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->getAttribute('last4');
    }

    /**
     * @return string
     */
    public function getExpYear()
    {
        return $this->getAttribute('expYear');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpYear($value)
    {
        return $this->setAttribute('expYear', $value);
    }

    /**
     * @return string
     */
    public function getExpMonth()
    {
        return $this->getAttribute('expMonth');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpMonth($value)
    {
        return $this->setAttribute('expMonth', $value);
    }
}
