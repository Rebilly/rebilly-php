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

use Rebilly\Rest\Entity;

/**
 * Class ApiKey
 *
 * ```json
 * {
 *   "id"
 *   "description"
 *   "datetimeFormat"
 *   "userName"
 *   "secretKey"
 *   "createdTime"
 * }
 * ```
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class ApiKey extends Entity
{
    /**
     * @return string;
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string;
     */
    public function getDatetimeFormat()
    {
        return $this->getAttribute('datetimeFormat');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDatetimeFormat($value)
    {
        return $this->setAttribute('datetimeFormat', $value);
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->getAttribute('userName');
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->getAttribute('secretKey');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
