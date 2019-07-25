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

final class ExtraDataLink extends Resource
{
    /**
     * @return string
     */
    public function getResourceType()
    {
        return $this->getAttribute('resourceType');
    }

    /**
     * @return string
     */
    public function getResourceId()
    {
        return $this->getAttribute('resourceId');
    }

    /**
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->getAttribute('placeholder');
    }
}
