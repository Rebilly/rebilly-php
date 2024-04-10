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
    public static function from(array $data = []): PostFileRequest
    {
        if (isset($data['file'])) {
            return new FileCreateFromInline($data);
        }
        if (isset($data['url'])) {
            return new FileCreateFromUrl($data);
        }

        throw new UnknownDiscriminatorValueException();
    }
}
