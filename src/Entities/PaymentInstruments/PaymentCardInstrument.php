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
 * Class PaymentCardInstrument
 *
 */
class PaymentCardInstrument extends PaymentMethodInstrument
{
    /**
     * @return string
     */
    public function getPaymentCardId()
    {
        return $this->getAttribute('paymentCardId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentCardId($value)
    {
        return $this->setAttribute('paymentCardId', $value);
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
        return PaymentMethod::METHOD_PAYMENT_CARD;
    }
}
