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

use DomainException;
use Rebilly\Rest\Resource;

abstract class PaymentInstrumentValidation extends Resource
{
    protected static $supportMethods = [
        PaymentMethod::METHOD_PAYMENT_CARD,
    ];

    /**
     * @param array $data
     *
     * @return PaymentCardValidation
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['method'])) {
            throw new DomainException('Method is required');
        }
        switch ($data['method']) {
            case PaymentMethod::METHOD_PAYMENT_CARD:
                $paymentInstrumentValidation = new PaymentCardValidation($data);

                break;
            default:
                throw new DomainException(
                    sprintf('Unexpected method. Only %s methods support', implode(',', self::$supportMethods))
                );
        }

        return $paymentInstrumentValidation;
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
