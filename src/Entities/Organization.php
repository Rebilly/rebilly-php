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
 * Class Organization
 *
 * ```json
 * {
 *   "id"
 *   "name"
 *   "address"
 *   "address2"
 *   "city"
 *   "region"
 *   "country"
 *   "postalCode"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class Organization extends Entity
{
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
     * @return string
     */
    public function getAddress()
    {
        return $this->getAttribute('address');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAddress($value)
    {
        return $this->setAttribute('address', $value);
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->getAttribute('address2');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAddress2($value)
    {
        return $this->setAttribute('address2', $value);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getAttribute('city');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCity($value)
    {
        return $this->setAttribute('city', $value);
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->getAttribute('region');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRegion($value)
    {
        return $this->setAttribute('region', $value);
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->getAttribute('country');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCountry($value)
    {
        return $this->setAttribute('country', $value);
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->getAttribute('postalCode');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPostalCode($value)
    {
        return $this->setAttribute('postalCode', $value);
    }
}
