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
 * Class WebhookTracking
 *
 * ```json
 * {
 *   "id"
 *   "eventType"
 *   "url"
 *   "method"
 *   "headers"
 *   "responseCode"
 *   "responseBody"
 *   "payload"
 *   "sentTime"
 *   "initiatedTime"
 *   "createdTime"
 * }
 * ```
 */
final class WebhookTracking extends Entity
{
    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->getAttribute('eventType');
    }

    /**
     * @return string
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
     * @return int
     */
    public function getResponseCode()
    {
        return $this->getAttribute('responseCode');
    }

    /**
     * @return string
     */
    public function getResponseBody()
    {
        return $this->getAttribute('responseBody');
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        return $this->getAttribute('payload');
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->getAttribute('headers');
    }

    /**
     * @return string
     */
    public function getSentTime()
    {
        return $this->getAttribute('sentTime');
    }

    /**
     * @return string
     */
    public function getIitiatedTime()
    {
        return $this->getAttribute('initiatedTime');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
