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
 *   "webHookUrl"
 *   "webHookUsername"
 *   "webHookPassword"
 *   "customFields"
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
     * @return array
     */
    public function getCustomFields()
    {
        return $this->getAttribute('customFields');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomFields($value)
    {
        return $this->setAttribute('customFields', $value);
    }
}
