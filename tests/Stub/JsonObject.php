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

    public function jsonSerialize(): array
    {
        return (array) $this->data;
    }
}
