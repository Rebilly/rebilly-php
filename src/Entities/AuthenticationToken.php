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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class AuthenticationToken.
 */
final class AuthenticationToken extends Entity
{
    public const MSG_UNEXPECTED_MODE = 'Unexpected mode. Only %s modes are supported';

    public const MODE_PASSWORD = 'password';

    public const MODE_PASSWORDLESS = 'passwordless';

    /**
     * @return array
     */
    public static function modes()
    {
        return [
            self::MODE_PASSWORD,
            self::MODE_PASSWORDLESS,
        ];
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
    public function getCredentialId()
    {
        return $this->getAttribute('credentialId');
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

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     * @return $this
     */
    public function setMode($value)
    {
        if (!in_array($value, self::modes(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_MODE, implode(', ', self::modes())));
        }

        return $this->setAttribute('mode', $value);
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setInvalidate($value)
    {
        return $this->setAttribute('invalidate', $value);
    }
}
