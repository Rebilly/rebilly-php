<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Stub;

use JsonSerializable;

/**
 * Class JsonObject.
 */
final class JsonObject implements JsonSerializable
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function jsonSerialize()
    {
        return (array) $this->data;
    }
}
