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
 */
final class CustomField extends Entity
{
    public const MSG_UNEXPECTED_TYPE = 'Unexpected type. Only %s types support';

    public const TYPE_ARRAY = 'array';

    public const TYPE_BOOLEAN = 'boolean';

    public const TYPE_DATE = 'date';

    public const TYPE_DATETIME = 'datetime';

    public const TYPE_INTEGER = 'integer';

    public const TYPE_MONETARY = 'monetary';

    public const TYPE_NUMBER = 'number';

    public const TYPE_STRING = 'string';

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
        if (!in_array($value, self::allowedTypes(), true)) {
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
