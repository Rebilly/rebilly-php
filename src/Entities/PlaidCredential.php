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

final class PlaidCredential extends Entity
{
    /**
     * @deprecated use {@see getId()} instead
     *
     * @return string
     */
    public function getHash()
    {
        return $this->getId();
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value)
    {
        return $this->setAttribute('status', $value);
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
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->getAttribute('clientId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setClientId($value)
    {
        return $this->setAttribute('clientId', $value);
    }

    /**
     * @return string
     */
    public function getSecretToken()
    {
        return $this->getAttribute('secretToken');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSecretToken($value)
    {
        return $this->setAttribute('secretToken', $value);
    }

    /**
     * @return bool
     */
    public function getUseStripe()
    {
        return $this->getAttribute('useStripe');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setUseStripe($value)
    {
        return $this->setAttribute('useStripe', $value);
    }

    /**
     * @return string
     */
    public function getDeactivationTime()
    {
        return $this->getAttribute('deactivationTime');
    }
}
