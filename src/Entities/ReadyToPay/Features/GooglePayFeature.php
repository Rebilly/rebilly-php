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

class GooglePayFeature extends ReadyToPayFeature
{
    public const FEATURE_NAME = 'Google Pay';

    /**
     * @return string
     */
    public function getMerchantName()
    {
        return $this->getAttribute('merchantName');
    }

    /**
     * @return string
     */
    public function getMerchantOrigin()
    {
        return $this->getAttribute('merchantOrigin');
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getAttribute('country');
    }

    /**
     * {@inheritdoc}
     */
    protected function featureName()
    {
        return self::FEATURE_NAME;
    }
}
