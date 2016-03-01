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
 * Class Log
 *
 * ```json
 * {
 *   "id"
 *   "status"
 *   "url"
 *   "method"
 *   "ipAddress"
 *   "request"
 *   "response"
 *   "duration"
 *   "createdTime"
 * }
 * ```
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class Log extends Entity
{
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string;
     */
    public function getUrl()
    {
        return $this->getAttribute('url');
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
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
    public function getRequest()
    {
        return $this->getAttribute('request');
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->getAttribute('response');
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->getAttribute('duration');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
