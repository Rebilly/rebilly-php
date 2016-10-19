<?php
/**
 * This attachment is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * attachment that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Attachment
 *
 * ```json
 * {
 *   "id"
 *   "fileId"
 *   "resourceType"
 *   "resourceId"
 *   "name"
 *   "description"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class Attachment extends Entity
{
    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getUpdatedTime()
    {
        return $this->getAttribute('updatedTime');
    }

    /**
     * @return bool
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName(
        $value
    ) {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @return $this
     */
    public function setDescription(
        $value
    ) {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return bool
     */
    public function getFileId()
    {
        return $this->getAttribute('fileId');
    }

    /**
     * @return $this
     */
    public function setFileId(
        $value
    ) {
        return $this->setAttribute('fileId', $value);
    }

    /**
     * @return array
     */
    public function getResourceId()
    {
        return $this->getAttribute('resourceId');
    }

    /**
     * @return $this
     */
    public function setResourceId($value)
    {
        return $this->setAttribute('resourceId', $value);
    }

    /**
     * @return string
     */
    public function getResourceType()
    {
        return $this->getAttribute('resourceType');
    }

    public function setResourceType($value)
    {
        return $this->setAttribute('resourceType', $value);
    }
}
