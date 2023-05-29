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

final class TaxJarCredential extends Entity
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
    public function getApiToken()
    {
        return $this->getAttribute('apiToken');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setApiToken($value)
    {
        return $this->setAttribute('apiToken', $value);
    }

    /**
     * @return string
     */
    public function getDeactivationTime()
    {
        return $this->getAttribute('deactivationTime');
    }
}
