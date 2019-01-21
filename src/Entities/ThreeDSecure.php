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

use Rebilly\Rest\Entity;

/**
 * Class ThreeDSecure.
 */
final class ThreeDSecure extends Entity
{
    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return bool
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
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
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getEnrolled()
    {
        return $this->getAttribute('enrolled');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEnrolled($value)
    {
        return $this->setAttribute('enrolled', $value);
    }

    /**
     * @return string
     */
    public function getEnrollmentEci()
    {
        return $this->getAttribute('enrollmentEci');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEnrollmentEci($value)
    {
        return $this->setAttribute('enrollmentEci', $value);
    }

    /**
     * @return string
     */
    public function getEci()
    {
        return $this->getAttribute('eci');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEci($value)
    {
        return $this->setAttribute('eci', $value);
    }

    /**
     * @return string
     */
    public function getCavv()
    {
        return $this->getAttribute('cavv');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCavv($value)
    {
        return $this->setAttribute('cavv', $value);
    }

    /**
     * @return string
     */
    public function getXid()
    {
        return $this->getAttribute('xid');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setXid($value)
    {
        return $this->setAttribute('xid', $value);
    }

    /**
     * @return string
     */
    public function getPayerAuthResponseStatus()
    {
        return $this->getAttribute('payerAuthResponseStatus');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPayerAuthResponseStatus($value)
    {
        return $this->setAttribute('payerAuthResponseStatus', $value);
    }

    /**
     * @return string
     */
    public function getSignatureVerification()
    {
        return $this->getAttribute('signatureVerification');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSignatureVerification($value)
    {
        return $this->setAttribute('signatureVerification', $value);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->getAttribute('transactionId');
    }
}
