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

namespace Rebilly\Entities\Contact;

use Rebilly\Rest\Resource;

/**
 * Class PhoneNumber. Represents a single phoneNumber in an Address resource.
 */
class PhoneNumber extends Resource
{
    /**
     * @param array $data
     *
     * @return PhoneNumber
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->getAttribute('label');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLabel($value)
    {
        return $this->setAttribute('label', $value);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * @return bool
     */
    public function getPrimary()
    {
        return $this->getAttribute('primary');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setPrimary($value)
    {
        return $this->setAttribute('primary', $value);
    }
}
