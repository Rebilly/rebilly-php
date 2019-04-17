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

use Rebilly\Rest\Resource;

/**
 * Class Product.
 */
final class ResourceAttachment extends Resource
{
    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return $this->getAttribute('resourceType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setResourceType($value): self
    {
        return $this->setAttribute('resourceType', $value);
    }

    /**
     * @return string
     */
    public function getResourceId(): string
    {
        return $this->getAttribute('resourceId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setResourceId($value): self
    {
        return $this->setAttribute('resourceId', $value);
    }
}
