<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use Rebilly\Client;
use Rebilly\Resource\Resource;

/**
 * Class AuthenticationOptions.
 *
 * ```json
 * {
 *   "passwordPattern"
 *   "credentialTtl"
 *   "authTokenTtl"
 *   "resetTokenTtl"
 * }
 * ```
 *
 * @todo Rename property `merchant` to `merchantId`
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class AuthenticationOptions extends Resource
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->getAttribute('merchant');
    }

    /**
     * @return string
     */
    public function getPasswordPattern()
    {
        return $this->getAttribute('passwordPattern');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPasswordPattern($value)
    {
        return $this->setAttribute('passwordPattern', $value);
    }

    /**
     * @return int
     */
    public function getCredentialTtl()
    {
        return $this->getAttribute('credentialTtl');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setCredentialTtl($value)
    {
        return $this->setAttribute('credentialTtl', (int) $value);
    }

    /**
     * @return int
     */
    public function getAuthTokenTtl()
    {
        return $this->getAttribute('authTokenTtl');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setAuthTokenTtl($value)
    {
        return $this->setAttribute('authTokenTtl', (int) $value);
    }

    /**
     * @return int
     */
    public function getResetTokenTtl()
    {
        return $this->getAttribute('resetTokenTtl');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setResetTokenTtl($value)
    {
        return $this->setAttribute('resetTokenTtl', (int) $value);
    }

    /********************************************************************************
     * Authentication Options API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @return AuthenticationOptions
     */
    public static function load()
    {
        return Client::get('authentication-options');
    }

    /**
     * Facade for client command
     *
     * @param array|AuthenticationOptions $data
     *
     * @return AuthenticationOptions
     */
    public static function update($data)
    {
        return Client::put($data, 'authentication-options');
    }
}
