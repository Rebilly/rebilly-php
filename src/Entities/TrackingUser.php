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

use Rebilly\Rest\Resource;

/**
 * Class TrackingUser
 *
 * ```json
 * {
 *   "userId"
 *   "apiKeyId"
 *   "email"
 *   "firstName"
 *   "lastName"
 *   "ipAddress"
 *   "userAgent"
 *   "fingerprint"
 *   "isSupport"
 * }
 * ```
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class TrackingUser extends Resource
{
    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->getAttribute('userId');
    }

    /**
     * @return string
     */
    public function getApiKeyId()
    {
        return $this->getAttribute('apiKeyId');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->getAttribute('ipAddress');
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->getAttribute('userAgent');
    }

    /**
     * @return string
     */
    public function getFingerprint()
    {
        return $this->getAttribute('fingerprint');
    }

    /**
     * @return bool
     */
    public function getIsSupport()
    {
        return $this->getAttribute('isSupport');
    }
}
