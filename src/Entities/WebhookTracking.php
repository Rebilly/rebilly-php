<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class WebhookTracking.
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
     * @return string
     */
    public function getPayload()
    {
        return $this->getAttribute('payload');
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->getAttribute('source');
    }

    /**
     * @return int
     */
    public function getAttempt()
    {
        return $this->getAttribute('attempt');
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
