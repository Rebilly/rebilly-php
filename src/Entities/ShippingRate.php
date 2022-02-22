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
 * Class ShippingRate.
 */
final class ShippingRate extends Entity
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const MSG_UNEXPECTED_STATUS = 'Unexpected status. Only %s are supported';

    public static function allowedStatuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
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
    public function setName(string $value): self
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
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
    public function setDescription(string $value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->getAttribute('price');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setPrice(float $value)
    {
        return $this->setAttribute('price', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency(string $value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return string
     */
    public function getFilter()
    {
        return $this->getAttribute('filter');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFilter(string $value)
    {
        return $this->setAttribute('filter', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus(string $value)
    {
        $allowedStatuses = self::allowedStatuses();

        if (!in_array($value, $allowedStatuses, true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_STATUS, implode(', ', $allowedStatuses)));
        }

        return $this->setAttribute('status', $value);
    }
}
