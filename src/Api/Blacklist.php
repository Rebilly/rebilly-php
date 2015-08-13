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

use ArrayObject;
use DomainException;
use Rebilly\Client;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Entity;

/**
 * Class Blacklist.
 *
 * ```json
 * {
 *   "type": "enum",
 *   "value": "string",
 *   "expireTime": "datetime",
 *   "createdTime": "datetime",
 *   "updatedTime": "datetime"
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Blacklist extends Entity
{
    /**
     * @return array
     */
    public static function types()
    {
        return ['paymentCard', 'customerId', 'email', 'ipAddress', 'bin', 'country'];
    }

    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     * @throws DomainException
     */
    public function setType($value)
    {
        if (!in_array($value, self::types())) {
            throw new DomainException('Only "' . implode(', ', self::types()) . ' type supports');
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * @return mixed
     */
    public function getExpireTime()
    {
        return $this->getAttribute('expireTime');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setExpireTime($value)
    {
        return $this->setAttribute('expireTime', $value);
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /********************************************************************************
     * Blacklist API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Blacklist[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('blacklists', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $blacklistId
     * @param array|ArrayObject $params
     *
     * @return Blacklist
     */
    public static function load($blacklistId, $params = [])
    {
        $params['blacklistId'] = $blacklistId;

        return Client::get('blacklists/{blacklistId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|Blacklist $data
     * @param string $blacklistId
     *
     * @return Blacklist
     */
    public static function create($data, $blacklistId = null)
    {
        if (isset($blacklistId)) {
            return Client::put($data, 'blacklists/{blacklistId}', ['blacklistId' => $blacklistId]);
        } else {
            return Client::post($data, 'blacklists');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $blacklistId
     */
    public static function delete($blacklistId)
    {
        Client::delete('blacklists/{blacklistId}', ['blacklistId' => $blacklistId]);
    }
}
