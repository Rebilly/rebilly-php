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

class ReadyToPayFeature extends Resource
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

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
}
