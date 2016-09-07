<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class CvvResponse
 */
final class CvvResponse extends Entity
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
