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
use DomainException;

/**
 * Class ValuesList
 *
 * ```json
 * {
 *   "id"
 *   "version"
 *   "name"
 *   "values"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class ValuesList extends Entity
{
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
     * @return int
     */
    public function getVersion()
    {
        return $this->getAttribute('version');
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->getAttribute('values');
    }

    /**
     * @param array $values
     *
     * @return $this
     * @throws DomainException
     */
    public function setValues(array $values)
    {
        $listValues = [];

        if (empty($values)) {
            throw new DomainException('Values cannot be empty');
        }

        foreach ($values as $value) {
            if (is_scalar($value)) {
                $listValues[] = $value;
            } else {
                throw new DomainException('Each value must be a scalar element');
            }
        }

        return $this->setAttribute('values', $listValues);
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return $this
     */
    public function addValue($value)
    {
        if (!is_string($value)) {
            throw new DomainException('List value must be string identifier');
        }

        $listValues = $this->getAttribute('values') ?: [];
        $listValues[] = $value;

        return $this->setAttribute('values', $listValues);
    }
}
