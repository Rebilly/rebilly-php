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
 * Class ApiTracking.
 */
final class ApiTracking extends Entity
{
    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
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
    public function getRoute()
    {
        return $this->getAttribute('route');
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
     * @return TrackingUser
     */
    public function getUser()
    {
        return $this->getAttribute('user');
    }

    /**
     * @param array $data
     *
     * @return TrackingUser
     */
    public function createUser(array $data)
    {
        return new TrackingUser($data);
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->getAttribute('duration');
    }

    /**
     * @return array
     */
    public function getRelatedIds()
    {
        return $this->getAttribute('relatedIds');
    }

    /**
     * @return array
     */
    public function getRequestHeaders()
    {
        return $this->getAttribute('requestHeaders');
    }

    /**
     * @return array
     */
    public function getResponseHeaders()
    {
        return $this->getAttribute('responseHeaders');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
