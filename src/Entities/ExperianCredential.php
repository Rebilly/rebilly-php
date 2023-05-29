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

final class ExperianCredential extends Entity
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
    public function getUsername()
    {
        return $this->getAttribute('username');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUsername($value)
    {
        return $this->setAttribute('username', $value);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getAttribute('password');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPassword($value)
    {
        return $this->setAttribute('password', $value);
    }

    /**
     * @return string
     */
    public function getHmacKey()
    {
        return $this->getAttribute('hmacKey');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHmacKey($value)
    {
        return $this->setAttribute('hmacKey', $value);
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->getAttribute('publicKey');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPublicKey($value)
    {
        return $this->setAttribute('publicKey', $value);
    }

    /**
     * @return string
     */
    public function getDeactivationTime()
    {
        return $this->getAttribute('deactivationTime');
    }
}
