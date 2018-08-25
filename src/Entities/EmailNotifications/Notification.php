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

namespace Rebilly\Entities\EmailNotifications;

use Rebilly\Rest\Resource;

final class Notification extends Resource
{
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEmail($value)
    {
        return $this->setAttribute('email', $value);
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setStatus($value)
    {
        return $this->setAttribute('status', $value);
    }
}
