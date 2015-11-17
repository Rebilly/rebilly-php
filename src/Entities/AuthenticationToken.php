<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class AuthenticationToken
 *
 * ```json
 * {
 *   "token"
 *   "username"
 *   "password"
 *   "expiredAt"
 * }
 * ```
 *
 * @todo Make time properties consistent, rename `expiredAt` to `expiredTime`
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class AuthenticationToken extends Entity
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
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredAt');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpiredTime($value)
    {
        return $this->setAttribute('expiredAt', $value);
    }
}
