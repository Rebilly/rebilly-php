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

namespace Rebilly\Entities\ReadyToPay\Features;

class PayPalBillingAgreementFeature extends ReadyToPayFeature
{
    public const FEATURE_NAME = 'PayPal billing agreement';

    /**
     * @return string
     */
    public function getPaypalMerchantId()
    {
        return $this->getAttribute('paypalMerchantId');
    }

    /**
     * @return string
     */
    public function getBillingAgreementToken()
    {
        return $this->getAttribute('billingAgreementToken');
    }

    /**
     * @return string
     */
    public function getExpirationTime()
    {
        return $this->getAttribute('expirationTime');
    }

    /**
     * {@inheritdoc}
     */
    protected function featureName()
    {
        return self::FEATURE_NAME;
    }
}
