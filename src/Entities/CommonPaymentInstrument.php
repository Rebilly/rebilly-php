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
 * Class CommonPaymentInstrument.
 */
class CommonPaymentInstrument extends Entity
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_EXPIRED = 'expired';

    public const STATUS_DEACTIVATED = 'deactivated';

    public const STATUS_VERIFICATION_NEEDED = 'verification-needed';

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMethod($value)
    {
        return $this->setAttribute('method', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value)
    {
        return $this->setAttribute('token', $value);
    }

    /**
     * @return string
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
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value);
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
     * @param array $data
     *
     * @return RiskMetadata
     */
    public function createRiskMetadata(array $data)
    {
        return RiskMetadata::createFromData($data);
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
    public function getFingerprint()
    {
        return $this->getAttribute('fingerprint');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPan($value)
    {
        return $this->setAttribute('pan', $value);
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->getAttribute('last4');
    }

    /**
     * @return string
     */
    public function getExpYear()
    {
        return $this->getAttribute('expYear');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpYear($value)
    {
        return $this->setAttribute('expYear', $value);
    }

    /**
     * @return string
     */
    public function getExpMonth()
    {
        return $this->getAttribute('expMonth');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpMonth($value)
    {
        return $this->setAttribute('expMonth', $value);
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->getAttribute('brand');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCvv($value)
    {
        return $this->setAttribute('cvv', $value);
    }

    /**
     * @return string
     */
    public function getBin()
    {
        return $this->getAttribute('bin');
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->getAttribute('bankName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBankName($value)
    {
        return $this->setAttribute('bankName', $value);
    }

    /**
     * @return string
     */
    public function getBankCountry()
    {
        return $this->getAttribute('bankCountry');
    }

    /**
     * @return string
     */
    public function getStickyGatewayAccountId()
    {
        return $this->getAttribute('stickyGatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStickyGatewayAccountId($value)
    {
        return $this->setAttribute('stickyGatewayAccountId', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountNumber($value)
    {
        return $this->setAttribute('accountNumber', $value);
    }

    /**
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->getAttribute('routingNumber');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRoutingNumber($value)
    {
        return $this->setAttribute('routingNumber', $value);
    }

    /**
     * @return string
     */
    public function getAccountNumberType()
    {
        return $this->getAttribute('accountNumberType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountNumberType($value)
    {
        return $this->setAttribute('accountNumberType', $value);
    }

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->getAttribute('accountType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAccountType($value)
    {
        return $this->setAttribute('accountType', $value);
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->getAttribute('bic');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBic($value)
    {
        return $this->setAttribute('bic', $value);
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->getAttribute('username');
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->getAttribute('number');
    }

    /**
     * @return null|string
     */
    public function getApprovalUrl()
    {
        return $this->getLink('approvalUrl');
    }

    public function getAuthTransaction()
    {
        if ($this->hasEmbeddedResource('authTransaction')) {
            return new Transaction($this->getEmbeddedResource('authTransaction'));
        }

        return null;
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
}
