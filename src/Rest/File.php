<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Rest;

/**
 * Class File.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class File
{
    /** @var string */
    private $content;

    /** @var int */
    private $size;

    /** @var string */
    private $mimeType;

    /**
     * @param string $mimeType
     * @param string $content
     * @param int|null $size
     */
    public function __construct($mimeType, $content, $size = null)
    {
        $this->mimeType = $mimeType;
        $this->content = $content;
        $this->size = $size !== null
            ? (int) $size
            : strlen($content);
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $filename
     */
    public function save($filename)
    {
        file_put_contents($filename, $this->getContent(), LOCK_EX);
    }
}
