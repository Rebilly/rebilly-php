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
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class CustomerCredential.
 *
 * ```json
 * {
 *   "id"
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
final class CustomerCredential extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

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
     * Customer Credential API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return CustomerCredential[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('credentials', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $credentialId
     * @param array|ArrayObject $params
     *
     * @return CustomerCredential
     */
    public static function load($credentialId, $params = [])
    {
        $params['credentialId'] = $credentialId;

        return Client::get('credentials/{credentialId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|CustomerCredential $data
     * @param string $credentialId
     *
     * @return CustomerCredential
     */
    public static function create($data, $credentialId = null)
    {
        if (isset($credentialId)) {
            return Client::put($data, 'credentials/{credentialId}', ['credentialId' => $credentialId]);
        } else {
            return Client::post($data, 'credentials');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $credentialId
     * @param array|CustomerCredential $data
     *
     * @return CustomerCredential
     */
    public static function update($credentialId, $data)
    {
        return Client::put($data, 'credentials/{credentialId}', ['credentialId' => $credentialId]);
    }

    /**
     * Facade for client command
     *
     * @param string $credentialId
     */
    public static function delete($credentialId)
    {
        Client::delete('credentials/{credentialId}', ['credentialId' => $credentialId]);
    }
}
