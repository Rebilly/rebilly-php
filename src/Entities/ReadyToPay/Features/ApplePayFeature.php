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

class ApplePayFeature extends ReadyToPayFeature
{
    public const FEATURE_NAME = 'Apple Pay';

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->getAttribute('displayName');
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
