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

use Rebilly\Rest\Resource;

/**
 * Class TrackingUser
 *
 * ```json
 * {
 *   "email"
 *   "firstName"
 *   "lastName"
 *   "isSupport"
 * }
 * ```
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class TrackingUser extends Resource
{
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('Email');
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->getAttribute('lastName');
    }

    /**
     * @return bool
     */
    public function getIsSupport()
    {
        return $this->getAttribute('isSupport');
    }
}
