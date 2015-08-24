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
 * Class Website
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
}
