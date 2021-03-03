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

use Rebilly\Entities\Contact\Email;
use Rebilly\Rest\Entity;

/**
 * Class Customer.
 */
final class Customer extends Entity
{
    /**
     * @deprecated Use getPrimaryAddress()->getEmails() instead
     *
     * @return string|null
     */
    public function getEmail()
    {
        if ($this->getPrimaryAddress() === null) {
            return null;
        }

        $emails = $this->getPrimaryAddress()->getEmails();
        if (empty($emails)) {
            return null;
        }

        foreach ($emails as $email) {
            if (($email['primary'] ?? false) === true) {
                return $email['value'];
            }
        }

        return $emails[0]['value'];
    }

    /**
     * @deprecated Use getPrimaryAddress()->setEmails() instead
     *
     * @param string $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        $primaryAddress = $this->getPrimaryAddress();
        $email = Email::createFromData([
            'label' => 'main',
            'value' => $value,
            'primary' => true,
        ]);

        if ($primaryAddress !== null) {
            $primaryAddress->setEmails([$email]);
        } else {
            $primaryAddress = Address::createFromData(['emails' => [$email]]);
        }

        $this->setPrimaryAddress($primaryAddress);
        $this->setAttribute('email', $value);

        return $this;
    }

    /**
     * @deprecated Use getPrimaryAddress()->getFirstName() instead
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getPrimaryAddress() !== null ? $this->getPrimaryAddress()->getFirstName() : null;
    }

    /**
     * @deprecated Use getPrimaryAddress()->setFirstName() instead
     *
     * @param string $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        $primaryAddress = $this->getPrimaryAddress();

        if ($primaryAddress !== null) {
            $primaryAddress->setFirstName($value);
        } else {
            $primaryAddress = Address::createFromData(['firstName' => $value]);
        }

        $this->setPrimaryAddress($primaryAddress);
        $this->setAttribute('firstName', $value);

        return $this;
    }

    /**
     * @deprecated Use getPrimaryAddress()->getLastName() instead
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getPrimaryAddress() !== null ? $this->getPrimaryAddress()->getLastName() : null;
    }

    /**
     * @deprecated Use getPrimaryAddress()->setLastName() instead
     *
     * @param string $value
     *
     * @return $this
     */
    public function setLastName($value)
    {
        $primaryAddress = $this->getPrimaryAddress();

        if ($primaryAddress !== null) {
            $primaryAddress->setLastName($value);
        } else {
            $primaryAddress = Address::createFromData(['lastName' => $value]);
        }

        $this->setPrimaryAddress($primaryAddress);
        $this->setAttribute('lastName', $value);

        return $this;
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
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
        // TODO: Remove after deprecated setEmail(), setFirstName(), setLastName() methods removed
        if (is_array($value)) {
            $value = Address::createFromData($value);
        }

        if (empty($value->getEmails()) && $this->getAttribute('email') !== null) {
            $email = Email::createFromData([
                'label' => 'main',
                'value' => $this->getAttribute('email'),
                'primary' => true,
            ]);

            $value->setEmails([$email]);
        }

        if (empty($value->getFirstName()) && $this->getAttribute('firstName') !== null) {
            $value->setFirstName($this->getAttribute('firstName'));
        }

        if (empty($value->getLastName()) && $this->getAttribute('lastName') !== null) {
            $value->setLastName($this->getAttribute('lastName'));
        }

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
     * @return CustomerAverageValue
     */
    public function getAverageValue()
    {
        return $this->getAttribute('averageValue');
    }

    /**
     * @param array $data
     *
     * @return CustomerAverageValue
     */
    public function createAverageValue(array $data)
    {
        return CustomerAverageValue::createFromData($data);
    }

    /**
     * @return int
     */
    public function getPaymentCount()
    {
        return $this->getAttribute('paymentCount');
    }

    /**
     * @return null|string
     */
    public function getLastPaymentTime()
    {
        return $this->getAttribute('lastPaymentTime');
    }

    /**
     * @return int
     */
    public function getInvoiceCount()
    {
        return $this->getAttribute('invoiceCount');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setPaymentToken(?string $value)
    {
        return $this->setAttribute('paymentToken', $value);
    }

    /**
     * @param string|null $value
     *
     * @return Customer
     */
    public function setWebsiteId(?string $value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string|null
     */
    public function getWebsiteId(): ?string
    {
        return $this->getAttribute('websiteId');
    }
}
