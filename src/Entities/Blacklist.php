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
    const TYPE_PAYMENT_CARD = 'payment-card';
    const TYPE_CUSTOMER_ID = 'customer-id';
    const TYPE_EMAIL = 'email';
    const TYPE_IP_ADDRESS = 'ip-address';
    const TYPE_BIN = 'bin';
    const TYPE_COUNTRY = 'country';
    const TYPE_FINGERPRINT = 'fingerprint';

    const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

    /**
     * @return array
     */
    public static function types()
    {
        return [
            self::TYPE_PAYMENT_CARD,
            self::TYPE_CUSTOMER_ID,
            self::TYPE_EMAIL,
            self::TYPE_IP_ADDRESS,
            self::TYPE_BIN,
            self::TYPE_COUNTRY,
            self::TYPE_FINGERPRINT,
        ];
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
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Blacklist::getExpiredTime()
     *
     * @return mixed
     */
    public function getExpireTime()
    {
        return $this->getAttribute('expireTime');
    }

    /**
     * @deprecated The method is deprecated and will be removed in next version.
     * @see Blacklist::setExpiredTime()
     *
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
    public function getExpiredTime()
    {
        return $this->getAttribute('expiredTime');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setExpiredTime($value)
    {
        return $this->setAttribute('expiredTime', $value);
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
