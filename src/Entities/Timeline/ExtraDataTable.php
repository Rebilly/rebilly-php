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

final class ExtraDataTable extends Resource
{
    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->getAttribute('data');
    }
}
