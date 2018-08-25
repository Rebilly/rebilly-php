<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Webhook
 */
final class Webhook extends Entity
{
    /**
     * @return array
     */
    public function getEventsFilter()
    {
        return $this->getAttribute('eventsFilter');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setEventsFilter($value)
    {
        return $this->setAttribute('eventsFilter', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function setStatus($value)
    {
        return $this->setAttribute('status', $value);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMethod($value)
    {
        return $this->setAttribute('method', $value);
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
     * @return array
     */
    public function getHeaders()
    {
        return $this->getAttribute('headers');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setHeaders($value)
    {
        return $this->setAttribute('headers', $value);
    }

    /**
     * @return string
     */
    public function getCredentialHash()
    {
        return $this->getAttribute('credentialHash');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCredentialHash($value)
    {
        return $this->setAttribute('credentialHash', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
