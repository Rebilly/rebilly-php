<?php

namespace Rebilly\Entities;


use Rebilly\Rest\Resource;

/**
 * Class Address. Represents a single email or a phoneNumber in an Address resource.
 */
class AddressContactInstrument extends Resource
{
    /*
     * @var string
     */
    private $label;

    /*
     * @var string
     */
    private $value;

    /*
     * @var bool
     */
    private $primary;

    /**
     * @param array $data
     *
     * @return AddressContactInstrument
     */
    public static function createFromData(array $data)
    {
        $item = new AddressContactInstrument($data);

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
