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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class GatewayAccount
 *
 * @see http://rebilly.github.io/RebillyAPI/#tag/Gateway%20Accounts
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class GatewayAccount extends Entity
{
    const TYPE_3DSECURE_INTEGRATED = 'integrated';
    const TYPE_3DSECURE_EXTERNAL = 'external';

    const MSG_UNEXPECTED_PAYMENT_CARD_SCHEME = 'Unexpected payment card scheme. Only %s payment card schemes support';
    const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s methods support';

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see GatewayAccount::allowedPaymentCardSchemes()
     *
     * @return array
     */
    public static function allowedPaymentMethods()
    {
        return self::allowedPaymentCardSchemes();
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see GatewayAccount::getPaymentCardSchemes()
     *
     * @return array
     */
    public function getPaymentMethods()
    {
        return $this->getPaymentCardSchemes();
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see GatewayAccount::setPaymentCardSchemes()
     *
     * @param array $value
     *
     * @return GatewayAccount
     */
    public function setPaymentMethods($value)
    {
        return $this->setPaymentCardSchemes($value);
    }

    /**
     * @return array
     */
    public static function allowedPaymentCardSchemes()
    {
        return [
            CardAssociation::BRAND_VISA,
            CardAssociation::BRAND_MASTERCARD,
            CardAssociation::BRAND_AMERICAN_EXPRESS,
            CardAssociation::BRAND_DISCOVER,
            CardAssociation::BRAND_MAESTRO,
            CardAssociation::BRAND_SOLO,
            CardAssociation::BRAND_ELECTRON,
            CardAssociation::BRAND_JCB,
            CardAssociation::BRAND_VOYAGER,
            CardAssociation::BRAND_DINERS_CLUB,
            CardAssociation::BRAND_SWITCH,
            CardAssociation::BRAND_LASER,
            CardAssociation::BRAND_CHINA_UNIONPAY,
        ];
    }

    /**
     * @return array
     */
    public static function allowedMethods()
    {
        return [
            PaymentMethod::METHOD_PAYMENT_CARD,
            PaymentMethod::METHOD_ACH,
            PaymentMethod::METHOD_PAYPAL,
            PaymentMethod::METHOD_CASH,
            PaymentMethod::METHOD_CHECK,
            PaymentMethod::METHOD_WIRE,
            PaymentMethod::METHOD_CHINA_UNIONPAY,
        ];
    }

    /**
     * @return string
     */
    public function getGatewayName()
    {
        return $this->getAttribute('gatewayName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setGatewayName($value)
    {
        return $this->setAttribute('gatewayName', $value);
    }

    /**
     * @return int
     */
    public function getMerchantCategoryCode()
    {
        return $this->getAttribute('merchantCategoryCode');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMerchantCategoryCode($value)
    {
        return $this->setAttribute('merchantCategoryCode', $value);
    }

    /**
     * @return string
     */
    public function getDescriptor()
    {
        return $this->getAttribute('descriptor');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescriptor($value)
    {
        return $this->setAttribute('descriptor', $value);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getAttribute('city');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCity($value)
    {
        return $this->setAttribute('city', $value);
    }

    /**
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->getAttribute('organizationId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setOrganizationId($value)
    {
        return $this->setAttribute('organizationId', $value);
    }

    /**
     * @return array
     */
    public function getWebsites()
    {
        return $this->getAttribute('websites');
    }

    /**
     * @param array $value
     *
     * @return $this
     * @throws DomainException
     */
    public function setWebsites(array $value)
    {
        $websites = [];

        foreach ($value as $website) {
            if ($website instanceof Website) {
                $websites[] = $website->getId();
            } elseif (is_string($website)) {
                $websites[] = $website;
            } else {
                throw new DomainException('Each website must be string identifier or Website entity object');
            }
        }

        return $this->setAttribute('websites', $websites);
    }

    /**
     * @return string
     */
    public function getAcquirerName()
    {
        return $this->getAttribute('acquirerName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAcquirerName($value)
    {
        return $this->setAttribute('acquirerName', $value);
    }

    /**
     * @return float
     */
    public function getMonthlyLimit()
    {
        return $this->getAttribute('monthlyLimit');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMonthlyLimit($value)
    {
        return $this->setAttribute('monthlyLimit', $value);
    }

    /**
     * @return array
     */
    public function getAcceptedCurrencies()
    {
        return $this->getAttribute('acceptedCurrencies');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setAcceptedCurrencies($value)
    {
        return $this->setAttribute('acceptedCurrencies', $value);
    }

    /**
     * @return string
     */
    public function getDowntimeStart()
    {
        return $this->getAttribute('downtimeStart');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDowntimeStart($value)
    {
        return $this->setAttribute('downtimeStart', $value);
    }

    /**
     * @return string
     */
    public function getDowntimeEnd()
    {
        return $this->getAttribute('downtimeEnd');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDowntimeEnd($value)
    {
        return $this->setAttribute('downtimeEnd', $value);
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setGatewayConfig($value)
    {
        return $this->setAttribute('gatewayConfig', $value);
    }

    /**
     * @return bool
     */
    public function getDynamicDescriptor()
    {
        return $this->getAttribute('dynamicDescriptor');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setDynamicDescriptor($value)
    {
        return $this->setAttribute('dynamicDescriptor', $value);
    }

    /**
     * @return bool
     */
    public function getThreeDSecure()
    {
        return $this->getAttribute('threeDSecure');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setThreeDSecure($value)
    {
        return $this->setAttribute('threeDSecure', $value);
    }

    /**
     * @return null|string
     */
    public function getThreeDSecureType()
    {
        return $this->getAttribute('threeDSecureType');
    }

    /**
     * @param null|string $value
     *
     * @return $this
     */
    public function setThreeDSecureType($value)
    {
        return $this->setAttribute('threeDSecureType', $value);
    }

    /**
     * @return array
     */
    public function getPaymentCardSchemes()
    {
        return $this->getAttribute('paymentCardSchemes');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setPaymentCardSchemes($value)
    {
        $allowedPaymentCardSchemes = self::allowedPaymentCardSchemes();

        foreach ($value as $paymentCardScheme) {
            if (!in_array($paymentCardScheme, $allowedPaymentCardSchemes)) {
                throw new DomainException(sprintf(self::MSG_UNEXPECTED_PAYMENT_CARD_SCHEME, implode(', ', $allowedPaymentCardSchemes)));
            }
        }

        return $this->setAttribute('paymentCardSchemes', $value);
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
        $allowedMethods = self::allowedMethods();

        if (!in_array($value, $allowedMethods)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, implode(', ', $allowedMethods)));
        }

        return $this->setAttribute('method', $value);
    }
}
