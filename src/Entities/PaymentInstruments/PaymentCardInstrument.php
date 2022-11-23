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
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        if (isset($data['paymentCardId'])) {
            $data['paymentInstrumentId'] = $data['paymentCardId'];
            unset($data['paymentCardId']);
        }
        parent::__construct(['method' => $this->methodName()] + $data);
    }

    /**
     * @return string
     */
    public function getPaymentInstrumentId()
    {
        return $this->getAttribute('paymentInstrumentId');
    }

    /**
     * @deprecated
     * @return string
     */
    public function getPaymentCardId()
    {
        return $this->getPaymentInstrumentId();
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentInstrumentId($value)
    {
        return $this->setAttribute('paymentInstrumentId', $value);
    }

    /**
     * @deprecated 
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentCardId($value)
    {
        return $this->setPaymentInstrumentId($value);
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
