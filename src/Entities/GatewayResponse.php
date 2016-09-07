<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Gateway
 */
final class GatewayResponse extends Entity
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    public function getMessage()
    {
        return $this->getAttribute('message');
    }

    public function getCode()
    {
        return $this->getAttribute('code');
    }

    public function getOriginalMessage()
    {
        return $this->getAttribute('originalMessage');
    }

    public function getOriginalCode()
    {
        return $this->getAttribute('originalCode');
    }
}
