<?php

declare(strict_types=1);

namespace Rebilly\Entities;

use LogicException;

final class PaymentToken extends PaymentCardToken
{
    public function setPan($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setCvv($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getLast4()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getExpYear()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setExpYear($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getExpMonth()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setExpMonth($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getFirstName()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setFirstName($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getLastName()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setLastName($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getAddress()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setAddress($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getAddress2()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setAddress2($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getCity()
    {
        $this->showDeprecationAlert(__METHOD__);
    }
    public function setCity($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getRegion()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setRegion($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getCountry()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setCountry($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getPostalCode()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setPostalCode($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function getPhoneNumber()
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    public function setPhoneNumber($value)
    {
        $this->showDeprecationAlert(__METHOD__);
    }

    private function showDeprecationAlert($method)
    {
        throw new LogicException(sprintf('The method %s is deprecated', $method));
    }
}
