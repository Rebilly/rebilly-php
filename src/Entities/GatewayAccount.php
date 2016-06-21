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
 * ```json
 * {
 *   "id"
 *   "gatewayName",
 *   "gatewayConfig",
 *   "merchantCategoryCode",
 *   "acquirerName'"
 *   "organizationId",
 *   "websites",
 *   "paymentMethods"
 *   "descriptor",
 *   "city",
 *   "dynamicDescriptor"
 *   "can3DSecure"
 *   "monthlyLimit",
 *   "acceptedCurrencies",
 *   "downtimeStart",
 *   "downtimeEnd",
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class GatewayAccount extends Entity
{
    const PAYMENT_METHOD_VISA = 'Visa';
    const PAYMENT_METHOD_MASTERCARD = 'MasterCard';
    const PAYMENT_METHOD_AMERICAN_EXPRESS = 'American Express';
    const PAYMENT_METHOD_DISCOVER = 'Discover';
    const PAYMENT_METHOD_MAESTRO = 'Maestro';
    const PAYMENT_METHOD_SOLO = 'Solo';
    const PAYMENT_METHOD_ELECTRON = 'Electron';
    const PAYMENT_METHOD_JCB = 'JCB';
    const PAYMENT_METHOD_VOYAGER = 'Voyager';
    const PAYMENT_METHOD_DINERS_CLUB = 'Diners Club';
    const PAYMENT_METHOD_SWITCH = 'Switch';
    const PAYMENT_METHOD_LASER = 'Laser';

    const TYPE_3DSECURE_INTEGRATED = 'integrated';
    const TYPE_3DSECURE_EXTERNAL = 'external';
    
    const METHOD_PAYMENT_CARD = 'payment_card';
    const METHOD_PAYPAL = 'paypal';
    const METHOD_ACH = 'ach';

    const MSG_UNEXPECTED_PAYMENT_CARD_SCHEME = 'Unexpected payment card scheme. Only %s payment card schemes support';
    const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s methods support';

    /**
     * @return array
     */
    public static function allowedPaymentCardSchemes()
    {
        return [
            self::PAYMENT_METHOD_VISA,
            self::PAYMENT_METHOD_MASTERCARD,
            self::PAYMENT_METHOD_AMERICAN_EXPRESS,
            self::PAYMENT_METHOD_DISCOVER,
            self::PAYMENT_METHOD_MAESTRO,
            self::PAYMENT_METHOD_SOLO,
            self::PAYMENT_METHOD_ELECTRON,
            self::PAYMENT_METHOD_JCB,
            self::PAYMENT_METHOD_VOYAGER,
            self::PAYMENT_METHOD_DINERS_CLUB,
            self::PAYMENT_METHOD_SWITCH,
            self::PAYMENT_METHOD_LASER
        ];
    }

    /**
     * @return array
     */
    public static function allowedMethods()
    {
        return [
            self::METHOD_PAYMENT_CARD,
            self::METHOD_ACH,
            self::METHOD_PAYPAL,
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
