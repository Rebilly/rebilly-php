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

use ArrayObject;
use Rebilly\Client;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Resource\Entity;

/**
 * Class AuthenticationToken.
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
 * @todo Add collection and `search` method
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class AuthenticationToken extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getToken();
    }

    /**
     * {@inheritdoc}
     */
    protected function setId($value)
    {
        return $this->setToken($value);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value)
    {
        return $this->setAttribute('token', $value);
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

    /********************************************************************************
     * Authentication Token API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param string $token
     * @param array|ArrayObject $params
     *
     * @return AuthenticationToken
     */
    public static function load($token, $params = [])
    {
        $params['token'] = $token;

        return Client::get('authentication-tokens/{token}', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $token
     *
     * @return AuthenticationToken
     */
    public static function verify($token)
    {
        try {
            Client::head('authentication-tokens/{token}', ['token' => $token]);

            return true;
        } catch (NotFoundException $e) {
            return false;
        }
    }

    /**
     * Facade for client command
     *
     * @param array|AuthenticationToken $data
     *
     * @return AuthenticationToken
     */
    public static function login($data)
    {
        return Client::post($data, 'authentication-tokens');
    }

    /**
     * Facade for client command
     *
     * @param string $token
     *
     * @return AuthenticationToken
     */
    public static function logout($token)
    {
        Client::delete('authentication-tokens/{token}', ['token' => $token]);
    }
}
