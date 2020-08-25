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

use Rebilly\Entities\PaymentInstruments\PaymentCardPaymentInstrument;
use Rebilly\Rest\Entity;

/**
 * @deprecated This class is considered deprecated in favour of PaymentToken
 */
class PaymentCardToken extends Entity
{
    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setPan($value)
    {
        return $this->setDefaultPaymentInstrumentValue('pan', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setCvv($value)
    {
        return $this->setDefaultPaymentInstrumentValue('cvv', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @return string
     */
    public function getLast4()
    {
        return $this->getDefaultPaymentInstrumentValue('last4');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @return string
     */
    public function getExpYear()
    {
        return $this->getDefaultPaymentInstrumentValue('expYear');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setExpYear($value)
    {
        return $this->setDefaultPaymentInstrumentValue('expYear', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @return string
     */
    public function getExpMonth()
    {
        return $this->getDefaultPaymentInstrumentValue('expMonth');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see PaymentCardToken::setPaymentInstrument()
     *
     * @param string $value
     *
     * @return $this
     */
    public function setExpMonth($value)
    {
        return $this->setDefaultPaymentInstrumentValue('expMonth', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getBillingAddressValue('firstName');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        return $this->setBillingAddressValue('firstName', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getBillingAddressValue('lastName');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setLastName($value)
    {
        return $this->setBillingAddressValue('lastName', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getBillingAddressValue('address');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setBillingAddressValue('address', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->getBillingAddressValue('address2');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setAddress2($value)
    {
        return $this->setBillingAddressValue('address2', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->getBillingAddressValue('city');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setCity($value)
    {
        return $this->setBillingAddressValue('city', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->getBillingAddressValue('region');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setRegion($value)
    {
        return $this->setBillingAddressValue('region', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getBillingAddressValue('country');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setCountry($value)
    {
        return $this->setBillingAddressValue('country', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->getBillingAddressValue('postalCode');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setPostalCode($value)
    {
        return $this->setBillingAddressValue('postalCode', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getBillingAddressValue('phoneNumber');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setPhoneNumber($value)
    {
        return $this->setBillingAddressValue('phoneNumber', $value);
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

    public function createBillingAddress(array $value)
    {
        return new Address($value);
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
    public function setFingerprint($value)
    {
        return $this->setAttribute('fingerprint', $value);
    }

    /**
     * @return bool
     */
    public function getIsUsed()
    {
        return $this->getAttribute('isUsed');
    }

    /**
     * @param LeadSource|array $value
     *
     * @return PaymentCardToken
     */
    public function setLeadSource($value)
    {
        return $this->setAttribute('leadSource', $value);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @return PaymentInstrument
     */
    public function getPaymentInstrument()
    {
        return PaymentInstrument::createFromData([
            'method' => $this->getMethod(),
        ] + $this->getAttribute('paymentInstrument'));
    }

    /**
     * @param PaymentInstrument $value
     *
     * @return $this
     */
    public function setPaymentInstrument(PaymentInstrument $value)
    {
        $this->setAttribute('method', $value->getMethod());
        $this->setAttribute('paymentInstrument', $value->jsonSerialize());

        return $this;
    }

    private function setDefaultPaymentInstrumentValue(string $attribute, $value)
    {
        if (!$this->getAttribute('paymentInstrument')) {
            $this->setPaymentInstrument(new PaymentCardPaymentInstrument());
        }

        $this->getPaymentInstrument()->setAttribute($attribute, $value);

        return $this;
    }

    private function getDefaultPaymentInstrumentValue(string $attribute)
    {
        if (!$this->getAttribute('paymentInstrument')) {
            $this->setPaymentInstrument(new PaymentCardPaymentInstrument());
        }

        return $this->getPaymentInstrument()->getAttribute($attribute);
    }

    private function setBillingAddressValue(string $attribute, $value)
    {
        if (!$this->getAttribute('billingAddress')) {
            $this->setBillingAddress([]);
        }

        $this->getBillingAddress()->setAttribute($attribute, $value);

        return $this;
    }

    private function getBillingAddressValue(string $attribute)
    {
        if (!$this->getAttribute('billingAddress')) {
            $this->setBillingAddress([]);
        }

        return $this->getBillingAddress()->getAttribute($attribute);
    }
}
