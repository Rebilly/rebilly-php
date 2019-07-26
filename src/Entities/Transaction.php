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
 * Class Transaction.
 */
final class Transaction extends Entity
{
    public const TYPE_AUTHORIZE = 'authorize';

    public const TYPE_SALE = 'sale';

    public const TYPE_CREDIT = 'credit';

    public static function types()
    {
        return [
            self::TYPE_AUTHORIZE,
            self::TYPE_SALE,
            self::TYPE_CREDIT,
        ];
    }

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
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getProcessedTime()
    {
        return $this->getAttribute('processedTime');
    }

    /**
     * @return string
     */
    public function getScheduledTime()
    {
        return $this->getAttribute('scheduledTime');
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setType($value)
    {
        return $this->setAttribute('type', $value);
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->getAttribute('result');
    }

    /**
     * @return string
     */
    public function getParentTransactionId()
    {
        return $this->getAttribute('parentTransaction');
    }

    /**
     * @return string
     */
    public function getRebillNumber()
    {
        return $this->getAttribute('rebillNumber');
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
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getPaymentCardId()
    {
        return $this->getAttribute('paymentCard');
    }

    /**
     * @return null|PaymentCard
     */
    public function getPaymentCard()
    {
        if ($this->hasEmbeddedResource('paymentCard')) {
            return new PaymentCard($this->getEmbeddedResource('paymentCard'));
        }

        return null;
    }

    /**
     * @return null|BankAccount
     */
    public function getBankAccount()
    {
        if ($this->hasEmbeddedResource('bankAccount')) {
            return new BankAccount($this->getEmbeddedResource('bankAccount'));
        }

        return null;
    }

    /**
     * @return Gateway|null
     */
    public function getGateway()
    {
        return ($this->getAttribute('gateway') !== null) ? new Gateway($this->getAttribute('gateway')) : null;
    }

    /**
     * @return bool
     */
    public function isApproved()
    {
        return $this->getResult() === 'approved';
    }

    /**
     * @return array
     */
    public function getSubscriptionIds()
    {
        return $this->getAttribute('subscriptionIds');
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
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return array
     */
    public function getChildTransactions()
    {
        return $this->getAttribute('childTransactions');
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @return string
     */
    public function getGatewayTransactionId()
    {
        return $this->getAttribute('gatewayTransactionId');
    }

    /**
     * @return string
     */
    public function getGatewayName()
    {
        return $this->getAttribute('gatewayName');
    }

    /**
     * @return string
     */
    public function getAcquirerName()
    {
        return $this->getAttribute('acquirerName');
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
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
     * @return string
     */
    public function getBin()
    {
        return $this->getAttribute('bin');
    }

    /**
     * @return bool
     */
    public function has3ds()
    {
        return $this->getAttribute('has3ds');
    }

    /**
     * @return bool
     */
    public function hasDcc()
    {
        return $this->getAttribute('hasDcc');
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress()
    {
        return $this->getAttribute('deliveryAddress');
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
     * @return RiskMetadata
     */
    public function getRiskMetadata()
    {
        return $this->getAttribute('riskMetadata');
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createBillingAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @return bool
     */
    public function getIsRetry()
    {
        return $this->getAttribute('isRetry');
    }

    /**
     * @return string
     */
    public function getRetriesResult()
    {
        return $this->getAttribute('retriesResult');
    }

    /**
     * @return array
     */
    public function getRedirectUrls()
    {
        return $this->getAttribute('redirectUrls');
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
     * @return string
     */
    public function getApprovalUrl()
    {
        return $this->getLink('approvalUrl');
    }

    /**
     * @return null|Customer
     */
    public function getCustomer()
    {
        if ($this->hasEmbeddedResource('customer')) {
            return new Customer($this->getEmbeddedResource('customer'));
        }

        return null;
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
     * @return string
     */
    public function getVelocity()
    {
        return $this->getAttribute('velocity');
    }

    /**
     * @return string
     */
    public function getRevision()
    {
        return $this->getAttribute('revision');
    }
}
