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
 * Class PaymentCardToken.
 */
final class PaymentCardToken extends Entity
{
    /**
     * @todo Rewrite ApiTest, which requires this method before deprecated methods.
     *
     * @param PaymentInstrument $value
     *
     * @return $this
     */
    public function setPaymentInstrument(PaymentInstrument $value)
    {
        $this->setAttribute('method', $value->name());
        $this->setAttribute('paymentInstrument', $value->jsonSerialize());

        return $this;
    }

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
        return $this->getAttribute('firstName');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
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
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
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
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getAttribute('address');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setAttribute('address', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->getAttribute('address2');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setAddress2($value)
    {
        return $this->setAttribute('address2', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->getAttribute('city');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setCity($value)
    {
        return $this->setAttribute('city', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->getAttribute('region');
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
        return $this->setAttribute('region', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getAttribute('country');
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
        return $this->setAttribute('country', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->getAttribute('postalCode');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setPostalCode($value)
    {
        return $this->setAttribute('postalCode', $value);
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getAttribute('phoneNumber');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version. Please use setBillingAddress.
     * @param string $value
     *
     * @return $this
     */
    public function setPhoneNumber($value)
    {
        return $this->setAttribute('phoneNumber', $value);
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
     * @param $attribute
     * @param $value
     *
     * @return $this
     */
    private function setDefaultPaymentInstrumentValue($attribute, $value)
    {
        $data = (array) $this->getAttribute('paymentInstrument');
        $data[$attribute] = $value;

        $this->setAttribute('method', PaymentMethod::METHOD_PAYMENT_CARD);
        $this->setAttribute('paymentInstrument', $data);

        return $this;
    }

    /**
     * @param $attribute
     *
     * @return mixed|null
     */
    private function getDefaultPaymentInstrumentValue($attribute)
    {
        $data = (array) $this->getAttribute('paymentInstrument');

        return $data[$attribute] ?? null;
    }
}
