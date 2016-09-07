<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class AvsResponse.
 */
final class AvsResponse extends Entity
{
    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getAttribute('message');
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->getAttribute('code');
    }
}
