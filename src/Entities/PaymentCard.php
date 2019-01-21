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
use Rebilly\Rest\Entity;

/**
 * Class PaymentCard.
 */
final class PaymentCard extends Entity
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

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
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setStatus($value)
    {
        if (!in_array($value, [self::STATUS_INACTIVE, self::STATUS_ACTIVE, self::STATUS_DEACTIVATED], true)) {
            throw new DomainException('Payment Card status is not in the list');
        }

        return $this->setAttribute('status', $value);
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->getAttribute('brand');
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
     * @deprecated The method is deprecated and will be removed in next version. Please use getBillingAddress.
     *
     * @return string
     */
    public function getBillingContactId()
    {
        return $this->getAttribute('billingContactId');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setBillingContactId($value)
    {
        return $this->setAttribute('billingContactId', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
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
     * @return string
     */
    public function getBankCountry()
    {
        return $this->getAttribute('bankCountry');
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
}
