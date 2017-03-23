<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
    const MSG_UNEXPECTED_EXTENSION = 'Unexpected extension. Only %s extensions are supported.';

    const EXTENSION_JPEG = 'jpeg';
    const EXTENSION_JPG = 'jpg';
    const EXTENSION_PDF = 'pdf';
    const EXTENSION_PNG = 'png';
    const EXTENSION_MP3 = 'mp3';

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
     * @return $this
     */
    public function setExtension($value)
    {
        if (!in_array($value, self::allowedTypes())) {
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
