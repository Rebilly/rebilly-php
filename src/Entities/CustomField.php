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
 * Class CustomField
 *
 * ```json
 * {
 *   "name"
 *   "type"
 *   "additionalSchema"
 *   "description"
 * }
 * ```
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class CustomField extends Entity
{
    const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

    const TYPE_ARRAY = 'array';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_DATE = 'date';
    const TYPE_DATETIME = 'datetime';
    const TYPE_INTEGER = 'integer';
    const TYPE_MONETARY = 'monetary';
    const TYPE_NUMBER = 'number';
    const TYPE_STRING = 'string';

    /**
     * @return array
     */
    public static function allowedTypes()
    {
        return [
            self::TYPE_ARRAY,
            self::TYPE_BOOLEAN,
            self::TYPE_DATE,
            self::TYPE_DATETIME,
            self::TYPE_INTEGER,
            self::TYPE_MONETARY,
            self::TYPE_NUMBER,
            self::TYPE_STRING,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value)
    {
        if (!in_array($value, self::allowedTypes())) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::allowedTypes())));
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return array
     */
    public function getAdditionalSchema()
    {
        return $this->getAttribute('additionalSchema');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setAdditionalSchema($value)
    {
        return $this->setAttribute('additionalSchema', $value);
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
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }
}
