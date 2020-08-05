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
 * Class Blocklist.
 */
final class Blocklist extends Entity
{
    public const TYPE_PAYMENT_CARD = 'payment-card';

    public const TYPE_CUSTOMER_ID = 'customer-id';

    public const TYPE_EMAIL = 'email';

    public const TYPE_IP_ADDRESS = 'ip-address';

    public const TYPE_BIN = 'bin';

    public const TYPE_COUNTRY = 'country';

    public const TYPE_FINGERPRINT = 'fingerprint';

    public const TYPE_EMAIL_DOMAIN = 'email-domain';

    public const TYPE_BANK_ACCOUNT = 'bank-account';

    public const TYPE_ADDRESS = 'address';

    public const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

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
            self::TYPE_EMAIL_DOMAIN,
            self::TYPE_BANK_ACCOUNT,
            self::TYPE_ADDRESS,
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
     * @throws DomainException
     * @return $this
     */
    public function setType($value)
    {
        if (!in_array($value, self::types(), true)) {
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
    public function getExpirationTime()
    {
        return $this->getAttribute('expirationTime');
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setExpirationTime($value)
    {
        return $this->setAttribute('expirationTime', $value);
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
