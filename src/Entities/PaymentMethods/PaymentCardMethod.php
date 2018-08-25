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

namespace Rebilly\Entities\PaymentMethods;

use Rebilly\Entities\PaymentMethod;

/**
 * Class PaymentCardMethod
 *
 */
final class PaymentCardMethod extends PaymentMethod
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
     * @return $this
     */
    public function setPaymentCardId($value)
    {
        return $this->setAttribute('paymentCardId', $value);
    }

    /**
     * @return string
     */
    public function getPaymentCardId()
    {
        return $this->getAttribute('paymentCardId');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setGatewayAccountId($value)
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }
}
