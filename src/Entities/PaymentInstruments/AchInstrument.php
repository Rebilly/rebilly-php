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
 * Class AchInstrument
 *
 */
class AchInstrument extends PaymentMethodInstrument
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        if ($data['bankAccountId']) {
            $data['paymentInstrumentId'] = $data['bankAccountId'];
            unset($data['bankAccountId']);
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
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentInstrumentId($value)
    {
        return $this->setAttribute('paymentInstrumentId', $value);
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
        return PaymentMethod::METHOD_ACH;
    }
}
