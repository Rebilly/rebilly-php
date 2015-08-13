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
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class Website.
 *
 * ```json
 * {
 *   "id"
 *   "name"
 *   "url"
 *   "phone"
 *   "email"
 *   "checkoutPageUri"
 *   "webHookUrl"
 *   "webHookUsername"
 *   "webHookPassword"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Website extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

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
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->getAttribute('url');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUrl($value)
    {
        return $this->setAttribute('url', $value);
    }

    /**
     * @return string
     */
    public function getServicePhone()
    {
        return $this->getAttribute('servicePhone');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setServicePhone($value)
    {
        return $this->setAttribute('servicePhone', $value);
    }

    /**
     * @return string
     */
    public function getServiceEmail()
    {
        return $this->getAttribute('serviceEmail');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setServiceEmail($value)
    {
        return $this->setAttribute('serviceEmail', $value);
    }

    /**
     * @return string
     */
    public function getCheckoutPageUri()
    {
        return $this->getAttribute('checkoutPageUri');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCheckoutPageUri($value)
    {
        return $this->setAttribute('checkoutPageUri', $value);
    }

    /**
     * @return string
     */
    public function getWebHookUrl()
    {
        return $this->getAttribute('webHookUrl');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebHookUrl($value)
    {
        return $this->setAttribute('webHookUrl', $value);
    }

    /**
     * @return string
     */
    public function getWebHookUsername()
    {
        return $this->getAttribute('webHookUsername');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebHookUsername($value)
    {
        return $this->setAttribute('webHookUsername', $value);
    }

    /**
     * @return string
     */
    public function getWebHookPassword()
    {
        return $this->getAttribute('webHookPassword');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebHookPassword($value)
    {
        return $this->setAttribute('webHookPassword', $value);
    }

    /********************************************************************************
     * Website API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Website[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('websites', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $websiteId
     * @param array|ArrayObject $params
     *
     * @return Website
     */
    public static function load($websiteId, $params = [])
    {
        $params['websiteId'] = $websiteId;

        return Client::get('websites/{websiteId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|Website $data
     * @param string $websiteId
     *
     * @return Website
     */
    public static function create($data, $websiteId = null)
    {
        if (isset($websiteId)) {
            return Client::put($data, 'websites/{websiteId}', ['websiteId' => $websiteId]);
        } else {
            return Client::post($data, 'websites');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $websiteId
     * @param array|Website $data
     *
     * @return Website
     */
    public static function update($websiteId, $data)
    {
        return Client::put($data, 'websites/{websiteId}', ['websiteId' => $websiteId]);
    }

    /**
     * Facade for client command
     *
     * @param string $websiteId
     */
    public static function delete($websiteId)
    {
        Client::delete('websites/{websiteId}', ['websiteId' => $websiteId]);
    }
}
