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

/**
 * Class ResetPasswordToken.
 */
final class ResetPasswordToken extends Entity
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getToken();
    }

    /**
     * @return string
     */
    public function getCredentialId()
    {
        return $this->getAttribute('credentialId');
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
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
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpiredTime($value)
    {
        return $this->setAttribute('expiredTime', $value);
    }
}
