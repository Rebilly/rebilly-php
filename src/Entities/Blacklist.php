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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Blacklist
 *
 * ```json
 * {
 *   "type": "enum",
 *   "value": "string",
 *   "expireTime": "datetime",
 *   "createdTime": "datetime",
 *   "updatedTime": "datetime"
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Blacklist extends Entity
{
    const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

    /**
     * @return array
     */
    public static function types()
    {
        return ['payment-card', 'customer-id', 'email', 'ip-address', 'bin', 'country', 'fingerprint'];
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     * @throws DomainException
     */
    public function setType($value)
    {
        if (!in_array($value, self::types())) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::types())));
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * @return mixed
     */
    public function getExpireTime()
    {
        return $this->getAttribute('expireTime');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setExpireTime($value)
    {
        return $this->setAttribute('expireTime', $value);
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
