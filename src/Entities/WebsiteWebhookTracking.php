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
 *   "websiteId"
 *   "eventName"
 *   "status"
 *   "response"
 *   "pushData"
 *   "sentTime"
 *   "nextSentTime"
 *   "createdTime"
 * }
 * ```
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class WebsiteWebhookTracking extends Entity
{
    /**
     * @return string;
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @return string;
     */
    public function getEventName()
    {
        return $this->getAttribute('eventName');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return int
     */
    public function getResponse()
    {
        return $this->getAttribute('response');
    }


    /**
     * @return string
     */
    public function getPushData()
    {
        return $this->getAttribute('pushData');
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
    public function getNextSentTime()
    {
        return $this->getAttribute('nextSentTime');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
