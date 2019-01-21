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

use Rebilly\Rest\Resource;

/**
 * Class PaymentCardAuthorization.
 */
final class PaymentCardAuthorization extends Resource
{
    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setGatewayAccountId($value)
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getAttribute('redirectUrl');
    }

    /**
     * @param string $value
     *
     * @return PaymentCardAuthorization
     */
    public function setRedirectUrl($value)
    {
        return $this->setAttribute('redirectUrl', $value);
    }
}
