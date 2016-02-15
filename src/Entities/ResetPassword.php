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
 * Class ResetPassword
 *
 * ```json
 * {
 *   "token"
 *   "newPassword"
 * }
 * ```
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class ResetPassword extends Resource
{
    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value)
    {
        return $this->setAttribute('token', $value);
    }

    /**
     * @return string
     */
    public function getNewPassword()
    {
        return $this->getAttribute('newPassword');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setNewPassword($value)
    {
        return $this->setAttribute('newPassword', $value);
    }
}
