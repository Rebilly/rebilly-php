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
    public static function from(array $data = [], array $metadata = []): SmtpAuthorization
    {
        return match ($data['type']) {
            'cram-md5' => SmtpAuthorizationCramMd5::from($data, $metadata),
            'login' => SmtpAuthorizationLogin::from($data, $metadata),
            'none' => SmtpAuthorizationNone::from($data, $metadata),
            'plain' => SmtpAuthorizationPlain::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
