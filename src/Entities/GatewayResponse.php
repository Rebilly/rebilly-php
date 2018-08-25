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

use Rebilly\Rest\Entity;

/**
 * Class GatewayResponse.
 */
final class GatewayResponse extends Entity
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

    /**
     * @return string
     */
    public function getOriginalMessage()
    {
        return $this->getAttribute('originalMessage');
    }

    /**
     * @return string
     */
    public function getOriginalCode()
    {
        return $this->getAttribute('originalCode');
    }
}
