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

namespace Rebilly\Entities\Shipping;

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class ShippingZone.
 */
final class ShippingZone extends Entity
{
    public const MSG_RATES_WRONG = 'Rates must be an array of Rate resources';

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return array
     */
    public function getCountries()
    {
        return $this->getAttribute('countries');
    }

    /**
     * @param string[] $value
     *
     * @return $this
     */
    public function setCountries($value)
    {
        return $this->setAttribute('countries', $value);
    }

    /**
     * @return array
     */
    public function getRates()
    {
        return $this->getAttribute('rates');
    }

    /**
     * @param Rate[] $value
     *
     * @return $this
     */
    public function setRates($value)
    {
        if (!is_array($value)) {
            throw new DomainException(self::MSG_RATES_WRONG);
        }

        return $this->setAttribute('rates', $value);
    }

    /**
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->getAttribute('isDefault');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsDefault($value)
    {
        return $this->setAttribute('isDefault', $value);
    }
}
