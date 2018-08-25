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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class File
 *
 * ```json
 * {
 *   "id"
 *   "name"
 *   "extension"
 *   "description"
 *   "tags"
 *   "sha1"
 *   "mime"
 *   "size"
 *   "width"
 *   "height"
 *   "createdTime"
 *   "updatedTime"
 * }
 * ```
 */
final class File extends Entity
{
    public const MSG_UNEXPECTED_EXTENSION = 'Unexpected extension. Only %s extensions are supported.';

    public const EXTENSION_JPEG = 'jpeg';

    public const EXTENSION_JPG = 'jpg';

    public const EXTENSION_PDF = 'pdf';

    public const EXTENSION_PNG = 'png';

    public const EXTENSION_MP3 = 'mp3';

    /**
     * @return array
     */
    public static function allowedTypes()
    {
        return [
            self::EXTENSION_JPEG,
            self::EXTENSION_JPG,
            self::EXTENSION_PDF,
            self::EXTENSION_PNG,
            self::EXTENSION_MP3,
        ];
    }

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
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->getAttribute('extension');
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setExtension($value)
    {
        if (!in_array($value, self::allowedTypes(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_EXTENSION, implode(', ', self::allowedTypes())));
        }

        return $this->setAttribute('extension', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->getAttribute('tags');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setTags($value)
    {
        return $this->setAttribute('tags', $value);
    }

    /**
     * @return string
     */
    public function getSha1()
    {
        return $this->getAttribute('sha1');
    }

    /**
     * @return string
     */
    public function getMime()
    {
        return $this->getAttribute('mime');
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->getAttribute('size');
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->getAttribute('width');
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->getAttribute('height');
    }
}
