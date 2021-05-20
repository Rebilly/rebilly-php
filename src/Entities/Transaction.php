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

use Rebilly\Entities\Transactions\PaymentInstruction;
use Rebilly\Entities\Transactions\ThreeDSecureResult;
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
     * @return array
     */
    public function getPlanIds()
    {
        return $this->getAttribute('planIds');
    }

    /**
     * @return bool
     */
    public function getIsDisputed()
    {
        return $this->getAttribute('isDisputed');
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
     * @param PaymentInstruction $value
     *
     * @return $this
     */
    public function setPaymentInstruction(PaymentInstruction $value)
    {
        return $this->setAttribute('paymentInstruction', $value->jsonSerialize());
    }

    /**
     * @return PaymentMethodInstrument
     */
    public function getPaymentInstrument()
    {
        return PaymentMethodInstrument::createFromData($this->getAttribute('paymentInstrument'));
    }

    /**
     * @deprecated use {@see setPaymentInstruction()} instead
     *
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
     * @return RiskMetadata|null
     */
    public function getRiskMetadata()
    {
        return $this->getAttribute('riskMetadata');
    }

    /**
     * @param RiskMetadata $value
     *
     * @return $this
     */
    public function setRiskMetadata(RiskMetadata $value)
    {
        return $this->setAttribute('riskMetadata', $value);
    }

    /**
     * @param ThreeDSecureResult $value
     *
     * @return $this
     */
    public function set3ds(ThreeDSecureResult $value)
    {
        return $this->setAttribute('3ds', $value);
    }

    /**
     * @param array $data
     *
     * @return RiskMetadata
     */
    public function createRiskMetadata(array $data)
    {
        return new RiskMetadata($data);
    }

    /**
     * @param array $data
     *
     * @return ThreeDSecureResult
     */
    public function create3ds(array $data)
    {
        return new ThreeDSecureResult($data);
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
     * @return string
     */
    public function getRetriedTransactionId()
    {
        return $this->getAttribute('retriedTransactionId');
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

    /**
     * @return string
     */
    public function getRequestAmount()
    {
        return $this->getAttribute('requestAmount');
    }

    /**
     * @return string
     */
    public function getRequestCurrency()
    {
        return $this->getAttribute('requestCurrency');
    }

    /**
     * @return string
     */
    public function getPurchaseAmount()
    {
        return $this->getAttribute('purchaseAmount');
    }

    /**
     * @return string
     */
    public function getPurchaseCurrency()
    {
        return $this->getAttribute('purchaseCurrency');
    }

    /**
     * @return string
     */
    public function getReportAmount()
    {
        return $this->getAttribute('reportAmount');
    }

    /**
     * @return string
     */
    public function getReportCurrency()
    {
        return $this->getAttribute('reportCurrency');
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

    /**
     * @return bool
     */
    public function getIsMerchantInitiated()
    {
        return $this->getAttribute('isMerchantInitiated');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsMerchantInitiated($value)
    {
        return $this->setAttribute('isMerchantInitiated', $value);
    }

    /**
     * @return string
     */
    public function getArn()
    {
        return $this->getAttribute('arn');
    }

    /**
     * @return string
     */
    public function getDisputeTime()
    {
        return $this->getAttribute('disputeTime');
    }

    /**
     * @return string
     */
    public function getDisputeStatus()
    {
        return $this->getAttribute('disputeStatus');
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
     * @return array
     */
    public function getReferenceData()
    {
        return $this->getAttribute('referenceData');
    }

    /**
     * @return bool
     */
    public function getIsRebill()
    {
        return $this->getAttribute('isRebill');
    }

    /**
     * @return ThreeDSecureResult
     */
    public function get3ds()
    {
        return $this->getAttribute('3ds');
    }

    /**
     * @return int
     */
    public function getRiskScore()
    {
        return $this->getAttribute('riskScore');
    }

    /**
     * @return int
     */
    public function getRetryNumber()
    {
        return $this->getAttribute('retryNumber');
    }

    /**
     * @return bool
     */
    public function getIsReconciled()
    {
        return $this->getAttribute('isReconciled');
    }

    /**
     * @return bool
     */
    public function getHadDiscrepancy()
    {
        return $this->getAttribute('hadDiscrepancy');
    }

    /**
     * @return bool
     */
    public function hasBumpOffer()
    {
        return $this->getAttribute('hasBumpOffer');
    }

    /**
     * @return bool
     */
    public function hasAmountAdjustment()
    {
        return $this->getAttribute('hasAmountAdjustment');
    }

    /**
     * @return string
     */
    public function getBillingDescriptor()
    {
        return $this->getAttribute('billingDescriptor');
    }
}
