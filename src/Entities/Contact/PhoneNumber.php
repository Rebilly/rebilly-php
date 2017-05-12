<?php

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
        $item = new PhoneNumber($data);

        return $item;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLabel($value)
    {
        return $this->setAttribute('firstName', $value);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setAttribute('firstName', $value);
    }

    /**
     * @return bool
     */
    public function getPrimary()
    {
        return $this->getAttribute('firstName');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setPrimary($value)
    {
        return $this->setAttribute('firstName', $value);
    }
}
