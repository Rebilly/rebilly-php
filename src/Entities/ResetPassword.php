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

use Rebilly\Rest\Resource;

/**
 * Class ResetPassword
 *
 * ```json
 * {
 *   "newPassword"
 * }
 * ```
 *
 */
final class ResetPassword extends Resource
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
}
