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

class PlaidFeature extends ReadyToPayFeature
{
    public const FEATURE_NAME = 'Plaid';

    /**
     * @return string
     */
    public function getLinkToken()
    {
        return $this->getAttribute('linkToken');
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
