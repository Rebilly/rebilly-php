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
use Rebilly\Client;
use Rebilly\ParamBag;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class Customer.
 *
 * ```json
 * {
 *   "id"
 *   "email"
 *   "firstName"
 *   "lastName"
 *   "ipAddress"
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Customer extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setAttribute('email', $value);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        return $this->setAttribute('firstName', $value);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLastName($value)
    {
        return $this->setAttribute('lastName', $value);
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->getAttribute('ipAddress');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setIpAddress($value)
    {
        return $this->setAttribute('ipAddress', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /********************************************************************************
     * Related resource
     *******************************************************************************/

    /**
     * @return string
     */
    public function getLeadSources()
    {
        if (!$this->hasEmbeddedResource('lead-sources')) {
            $this->setEmbeddedResource(
                'lead-sources',
                LeadSource::search(ParamBag::create()->filter('customerId', $this->getId()))
            );
        }

        return $this->getEmbeddedResource('lead-sources');
    }

    /********************************************************************************
     * Customer API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Customer[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('customers', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $customerId
     * @param array|ArrayObject $params
     *
     * @return Customer
     */
    public static function load($customerId, $params = [])
    {
        $params['customerId'] = $customerId;

        return Client::get('customers/{customerId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|Customer $data
     * @param string $customerId
     *
     * @return Customer
     */
    public static function create($data, $customerId = null)
    {
        if (isset($customerId)) {
            return Client::put($data, 'customers/{customerId}', ['customerId' => $customerId]);
        } else {
            return Client::post($data, 'customers');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $customerId
     * @param array|Customer $data
     *
     * @return Customer
     */
    public static function update($customerId, $data)
    {
        return Client::put($data, 'customers/{customerId}', ['customerId' => $customerId]);
    }
}
