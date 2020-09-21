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
 * Class Payout.
 */
final class Payout extends Entity
{
    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param $value
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
     * @param $value
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
    public function getProcessedTime()
    {
        return $this->getAttribute('processedTime');
    }

    /**
     * Can be specified only if transaction was processed outside (isProcessedOutside = true).
     *
     * @param $value
     *
     * @return $this
     */
    public function setProcessedTime($value)
    {
        return $this->setAttribute('processedTime', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param $value
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
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param $value
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
    public function getRequestId()
    {
        return $this->getAttribute('requestId');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setRequestId($value)
    {
        return $this->setAttribute('requestId', $value);
    }

    /**
     * @return array
     */
    public function getInvoiceIds()
    {
        return $this->getAttribute('invoiceIds');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setInvoiceIds($value)
    {
        return $this->setAttribute('invoiceIds', $value);
    }

    /**
     * @return PaymentMethodInstrument
     */
    public function getPaymentInstrument()
    {
        return PaymentMethodInstrument::createFromData($this->getAttribute('paymentInstrument'));
    }

    /**
     * @param PaymentMethodInstrument $value
     *
     * @return $this
     */
    public function setPaymentInstrument(PaymentMethodInstrument $value)
    {
        return $this->setAttribute('paymentInstrument', $value->jsonSerialize());
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value);
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getAttribute('redirectUrl');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setRedirectUrl($value)
    {
        return $this->setAttribute('redirectUrl', $value);
    }

    /**
     * @return string
     */
    public function getNotificationUrl()
    {
        return $this->getAttribute('notificationUrl');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setNotificationUrl($value)
    {
        return $this->setAttribute('notificationUrl', $value);
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->getAttribute('customFields');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomFields($value)
    {
        return $this->setAttribute('customFields', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return bool
     */
    public function getIsProcessedOutside()
    {
        return $this->getAttribute('isProcessedOutside');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsProcessedOutside($value)
    {
        return $this->setAttribute('isProcessedOutside', $value);
    }
}
