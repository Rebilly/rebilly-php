<?php

namespace Rebilly\Entities\Contact;

use Rebilly\Rest\Resource;

/**
 * Class Email. Represents a single email in an Address resource.
 */
class Email extends Resource
{
    /**
     * @param array $data
     *
     * @return Email
     */
    public static function createFromData(array $data)
    {
        $item = new Email($data);

        return $item;
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
