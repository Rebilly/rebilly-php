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
 * Class PayPalInstrument
 *
 */
class PayPalInstrument extends PaymentMethodInstrument
{
    /**
     * @return string
     */
    public function getPayPalAccountId()
    {
        return $this->getAttribute('payPalAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPayPalAccountId($value)
    {
        return $this->setAttribute('payPalAccountId', $value);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setGatewayAccountId($value)
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentMethod::METHOD_PAYPAL;
    }
}
