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
 * Class Customer
 *
 * ```json
 * {
 *   "id"
 *   "customFields"
 *   "defaultPaymentInstrument"
 *   "invoiceCount"
 *   "lifetimeRevenue"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class Customer extends Entity
{
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setAttribute('email', $value);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        return $this->setAttribute('firstName', $value);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLastName($value)
    {
        return $this->setAttribute('lastName', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Payment::getRiskMetadata()
     * @see Subscription::getRiskMetadata()
     * @see Transaction::getRiskMetadata()
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->getAttribute('ipAddress');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Payment::setRiskMetadata()
     * @see Subscription::setRiskMetadata()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setIpAddress($value)
    {
        return $this->setAttribute('ipAddress', $value);
    }

    /**
     * @return Address
     */
    public function getPrimaryAddress()
    {
        return $this->getAttribute('primaryAddress');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setPrimaryAddress($value)
    {
        return $this->setAttribute('primaryAddress', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
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
     * @return PaymentMethodInstrument
     */
    public function getDefaultPaymentInstrument()
    {
        return $this->getAttribute('defaultPaymentInstrument');
    }

    /**
     * @param PaymentMethodInstrument $value
     *
     * @return $this
     */
    public function setDefaultPaymentInstrument($value)
    {
        return $this->setAttribute('defaultPaymentInstrument', $value);
    }

    /**
     * @param array $data
     *
     * @return PaymentMethodInstrument
     */
    public function createDefaultPaymentInstrument(array $data)
    {
        return PaymentMethodInstrument::createFromData($data);
    }

    /**
     * @return null|LeadSource
     */
    public function getLeadSource()
    {
        if ($this->hasEmbeddedResource('leadSource')) {
            return new LeadSource($this->getEmbeddedResource('leadSource'));
        }

        return null;
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createPrimaryAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @return CustomerLifetimeRevenue
     */
    public function getLifetimeRevenue()
    {
        return $this->getAttribute('lifetimeRevenue');
    }

    /**
     * @param array $data
     *
     * @return CustomerLifetimeRevenue
     */
    public function createLifetimeRevenue(array $data)
    {
        return CustomerLifetimeRevenue::createFromData($data);
    }

    /**
     * @return int
     */
    public function getInvoiceCount()
    {
        return $this->getAttribute('invoiceCount');
    }
}
