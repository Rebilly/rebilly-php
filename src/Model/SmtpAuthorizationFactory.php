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

class SmtpAuthorizationFactory
{
    public static function from(array $data = []): SmtpAuthorization
    {
        return match ($data['type']) {
            'cram-md5' => CramMd5::from($data),
            'login' => Login::from($data),
            'none' => SmtpAuthorizationNone::from($data),
            'plain' => Plain::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
