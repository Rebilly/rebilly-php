<?php

namespace Rebilly\Entities;

use Rebilly\Rest\Resource;

/**
 * Class AvsResponse.
 */
final class AvsResponse extends Resource
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
