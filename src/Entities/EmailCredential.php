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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class EmailCredential
 *
 * ```json
 * {
 *   "id"
 *   "senderName"
 *   "senderEmail"
 *   "username"
 *   "host"
 *   "port"
 *   "authenticationMethod"
 *   "encryptionMethod"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class EmailCredential extends Entity
{
    const AUTH_METHOD_NONE = 'none';
    const AUTH_METHOD_PLAIN = 'plain';
    const AUTH_METHOD_LOGIN = 'login';
    const AUTH_METHOD_CRAM_MD5 = 'cram-md5';

    const ENCRYPTION_METHOD_NONE = 'none';
    const ENCRYPTION_METHOD_TLS = 'tls';
    const ENCRYPTION_METHOD_SSL = 'ssl';

    const MSG_UNEXPECTED_AUTH_METHOD = 'Unexpected authentication method. Only %s methods support';
    const MSG_UNEXPECTED_ENCRYPTION_METHOD = 'Unexpected encryption method. Only %s methods support';

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return bool
     */
    public function getSenderName()
    {
        return $this->getAttribute('senderName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSenderName($value)
    {
        return $this->setAttribute('senderName', $value);
    }

    /**
     * @return string
     */
    public function getSenderEmail()
    {
        return $this->getAttribute('senderEmail');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSenderEmail($value)
    {
        return $this->setAttribute('senderEmail', $value);
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
    public function getHost()
    {
        return $this->getAttribute('host');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHost($value)
    {
        return $this->setAttribute('host', $value);
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->getAttribute('port');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPort($value)
    {
        return $this->setAttribute('port', $value);
    }

    /**
     * @return string
     */
    public function getAuthenticationMethod()
    {
        return $this->getAttribute('authenticationMethod');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAuthenticationMethod($value)
    {
        $allowedMethods = self::allowedAuthenticationMethods();
        if (!in_array($value, $allowedMethods)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_AUTH_METHOD, implode(', ', $allowedMethods)));
        }

        return $this->setAttribute('authenticationMethod', $value);
    }

    /**
     * @return string
     */
    public function getEncryptionMethod()
    {
        return $this->getAttribute('encryptionMethod');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEncryptionMethod($value)
    {
        $allowedMethods = self::allowedEncryptionMethods();
        if (!in_array($value, $allowedMethods)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_ENCRYPTION_METHOD, implode(', ', $allowedMethods)));
        }

        return $this->setAttribute('encryptionMethod', $value);
    }

    /**
     * @return array
     */
    public static function allowedAuthenticationMethods()
    {
        return [
            self::AUTH_METHOD_NONE,
            self::AUTH_METHOD_PLAIN,
            self::AUTH_METHOD_LOGIN,
            self::AUTH_METHOD_CRAM_MD5,
        ];
    }

    /**
     * @return array
     */
    public static function allowedEncryptionMethods()
    {
        return [
            self::ENCRYPTION_METHOD_NONE,
            self::ENCRYPTION_METHOD_SSL,
            self::ENCRYPTION_METHOD_TLS,
        ];
    }
}
