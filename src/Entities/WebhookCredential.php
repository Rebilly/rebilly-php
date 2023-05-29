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
 * Class WebhookCredential.
 */
final class WebhookCredential extends Entity
{
    /**
     * @deprecated use {@see getId()} instead
     *
     * @return string
     */
    public function getHash()
    {
        return $this->getId();
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->getAttribute('host');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setHost($value)
    {
        return $this->setAttribute('host', $value);
    }

    /**
     * @return array
     */
    public function getAuth()
    {
        return $this->getAttribute('auth');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setAuth($value)
    {
        return $this->setAttribute('auth', $value);
    }
}
