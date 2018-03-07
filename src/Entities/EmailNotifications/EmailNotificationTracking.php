<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\EmailNotifications;

use Rebilly\Rest\Entity;

/**
 * Class EmailNotificationTracking
 *
 * ```json
 * {
 *   "id"
 *   "eventType"
 *   "responseCode"
 *   "responseBody"
 *   "body"
 *   "subject"
 *   "email"
 *   "sentTime"
 *   "initiatedTime"
 *   "createdTime"
 * }
 * ```
 */
final class EmailNotificationTracking extends Entity
{
    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->getAttribute('eventType');
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
     * @return string
     */
    public function getBody()
    {
        return $this->getAttribute('body');
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->getAttribute('subject');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
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
    public function getInitiatedTime()
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
