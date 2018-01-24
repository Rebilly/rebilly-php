<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2018 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\EmailNotifications;

use Rebilly\Rest\Resource;

/**
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
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
    public function getActive()
    {
        return $this->getAttribute('active');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setActive($value)
    {
        return $this->setAttribute('active', $value);
    }
}
