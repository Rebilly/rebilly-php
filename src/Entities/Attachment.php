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
 *   "relatedType"
 *   "relatedId"
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
    public function getRelatedId()
    {
        return $this->getAttribute('relatedId');
    }

    /**
     * @return $this
     */
    public function setRelatedId($value)
    {
        return $this->setAttribute('relatedId', $value);
    }

    /**
     * @return string
     */
    public function getRelatedType()
    {
        return $this->getAttribute('relatedType');
    }

    public function setRelatedType($value)
    {
        return $this->setAttribute('relatedType', $value);
    }
}
