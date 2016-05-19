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
 * Class UpdatePassword
 *
 * ```json
 * {
 *   "currentPassword"
 *   "newPassword"
 * }
 * ```
 */
final class UpdatePassword extends Resource
{
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

    /**
     * @return string
     */
    public function getCurrentPassword()
    {
        return $this->getAttribute('currentPassword');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrentPassword($value)
    {
        return $this->setAttribute('currentPassword', $value);
    }
}
