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

class AuthenticationTokenFactory
{
    public static function from(array $data = [], array $metadata = []): AuthenticationToken
    {
        return match ($data['mode']) {
            'passwordless' => AuthenticationTokenPasswordlessMode::from($data, $metadata),
            'password' => AuthenticationTokenPasswordMode::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
