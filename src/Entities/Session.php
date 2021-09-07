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
 * Class Session.
 */
final class Session extends Entity
{
    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->getAttribute('permissions');
    }

    /**
     * @return array
     */
    public function getCustomClaims()
    {
        return $this->getAttribute('customClaims');
    }

    /**
     * @return string
     */
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredTime');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->getAttribute('userId');
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }
}
