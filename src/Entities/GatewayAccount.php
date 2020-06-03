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
use Rebilly\Entities\RulesEngine\Condition;
use Rebilly\Rest\Entity;

/**
 * Class GatewayAccount.
 */
final class GatewayAccount extends Entity
{
    public const TYPE_3DSECURE_INTEGRATED = 'integrated';

    public const TYPE_3DSECURE_EXTERNAL = 'external';

    public const MSG_UNEXPECTED_PAYMENT_CARD_SCHEME = 'Unexpected payment card scheme. Only %s payment card schemes support';

    public const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s methods support';

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
            PaymentCardScheme::SCHEME_VISA,
            PaymentCardScheme::SCHEME_MASTERCARD,
            PaymentCardScheme::SCHEME_AMERICAN_EXPRESS,
            PaymentCardScheme::SCHEME_DISCOVER,
            PaymentCardScheme::SCHEME_MAESTRO,
            PaymentCardScheme::SCHEME_SOLO,
            PaymentCardScheme::SCHEME_ELECTRON,
            PaymentCardScheme::SCHEME_JCB,
            PaymentCardScheme::SCHEME_VOYAGER,
            PaymentCardScheme::SCHEME_DINERS_CLUB,
            PaymentCardScheme::SCHEME_SWITCH,
            PaymentCardScheme::SCHEME_LASER,
            PaymentCardScheme::SCHEME_CHINA_UNIONPAY,
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
     * @return bool
     */
    public function getIsDown()
    {
        return $this->getAttribute('isDown');
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
            if (!in_array($paymentCardScheme, $allowedPaymentCardSchemes, true)) {
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

        if (!in_array($value, $allowedMethods, true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, implode(', ', $allowedMethods)));
        }

        return $this->setAttribute('method', $value);
    }

    /**
     * @deprecated use additionalFilters instead
     */
    public function getAdditionalCriteria(): Condition
    {
        return $this->getAttribute('additionalCriteria');
    }

    /**
     * @deprecated use additionalFilters instead
     *
     * @param Condition $value
     */
    public function setAdditionalCriteria($value): self
    {
        return $this->setAttribute('additionalCriteria', $value);
    }

    /**
     * @deprecated
     */
    public function createAdditionalCriteria(array $data): Condition
    {
        return Condition::createFromData($data);
    }

    /**
     * @return string|null
     */
    public function getAdditionalFilters(): ?string
    {
        return $this->getAttribute('additionalFilters');
    }

    /**
     * @param string|null $additionalFilters
     *
     * @return $this
     */
    public function setAdditionalFilters(?string $additionalFilters): self
    {
        return $this->setAttribute('additionalFilters', $additionalFilters);
    }

    /**
     * @return bool
     */
    public function getReconciliationWindowEnabled()
    {
        return $this->getAttribute('reconciliationWindowEnabled');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setReconciliationWindowEnabled($value)
    {
        return $this->setAttribute('reconciliationWindowEnabled', $value);
    }

    /**
     * @return int
     */
    public function getReconciliationWindowTtl()
    {
        return $this->getAttribute('reconciliationWindowTtl');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setReconciliationWindowTtl($value)
    {
        return $this->setAttribute('reconciliationWindowTtl', $value);
    }
}
