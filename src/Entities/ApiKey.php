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

use DomainException;
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
 */
final class ApiKey extends Entity
{
    public const DATETIME_FORMAT_MYSQL = 'mysql';

    public const DATETIME_FORMAT_ISO8601 = 'iso8601';

    public const MSG_UNEXPECTED_DATETIME_FORMAT = 'Unexpected datetime format. Only %s formats support';

    /**
     * @return array
     */
    public static function datetimeFormats()
    {
        return [self::DATETIME_FORMAT_MYSQL, self::DATETIME_FORMAT_ISO8601];
    }

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
        if (!in_array($value, self::datetimeFormats(), true)) {
            throw new DomainException(
                sprintf(self::MSG_UNEXPECTED_DATETIME_FORMAT, implode(', ', self::datetimeFormats()))
            );
        }

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
