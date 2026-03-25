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

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use Rebilly\Sdk\Exception\UnknownDiscriminatorValueException;

class PostFileRequestFactory
{
    public static function from(array $data = [], array $metadata = []): PostFileRequest
    {
        if (isset($data['file'])) {
            return FileCreateFromInline::from($data, $metadata);
        }
        if (isset($data['url'])) {
            return FileCreateFromUrl::from($data, $metadata);
        }

        throw new UnknownDiscriminatorValueException();
    }
}
