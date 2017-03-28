<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Customer
 *
 * ```json
 * {
 *   "id"
 *   "email"
 *   "firstName"
 *   "lastName"
 *   "ipAddress"
 *   "customFields"
 * }
 * ```
 */
final class Customer extends Entity
{
    /**
     * @return string
     */
    public function getPrimaryContactId()
    {
        return $this->getAttribute('primaryContactId');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Contact::getEmail()
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Contact::setEmail()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setAttribute('email', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Contact::getFirstName()
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Contact::setFirstName()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        return $this->setAttribute('firstName', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Contact::getLastName()
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Contact::setLastName()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setLastName($value)
    {
        return $this->setAttribute('lastName', $value);
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->getAttribute('ipAddress');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setIpAddress($value)
    {
        return $this->setAttribute('ipAddress', $value);
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
    public function setDefaultPaymentInstrument(PaymentMethodInstrument $value)
    {
        return $this->setAttribute('defaultPaymentInstrument', $value->jsonSerialize());
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
        } else {
            return null;
        }
    }

    /**
     * @return null|Contact
     */
    public function getPrimaryContact()
    {
        if ($this->hasEmbeddedResource('primaryContact')) {
            return new Contact($this->getEmbeddedResource('primaryContact'));
        } else {
            return null;
        }
    }
}
