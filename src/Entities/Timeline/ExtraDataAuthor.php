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

namespace Rebilly\Entities\Timeline;

use Rebilly\Rest\Resource;

final class ExtraDataAuthor extends Resource
{
    /**
     * @return string
     */
    public function getUserFullName()
    {
        return $this->getAttribute('userFullName');
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->getAttribute('userId');
    }
}
