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


use Rebilly\Rest\Resource;

class PaymentInstrumentValidation extends Resource
{
    /**
     * @inheritdoc
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setMethod($value)
    {
        return $this->setAttribute('method', $value);
    }

    /**
     * @param $value
     * @return $this
     */
    public function setPaymentInstrumentId($value)
    {
        return $this->setAttribute('paymentInstrumentId', $value);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @return string
     */
    public function getPaymentInstrumentId()
    {
        return $this->getAttribute('paymentInstrumentId');
    }

    /**
     * @return string
     */
    public function getActionCode()
    {
        return $this->getAttribute('actionCode');
    }

    /**
     * @return string
     */
    public function getResponseCode()
    {
        return $this->getAttribute('responseCode');
    }

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
     * @return string
     */
    public function getExpMonth()
    {
        return $this->getAttribute('expMonth');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
    }
}
