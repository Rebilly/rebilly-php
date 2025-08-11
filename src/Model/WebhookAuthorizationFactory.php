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

class WebhookAuthorizationFactory
{
    public static function from(array $data = []): WebhookAuthorization
    {
        return match ($data['type']) {
            'basic' => WebhookAuthorizationBasic::from($data),
            'digest' => WebhookAuthorizationDigest::from($data),
            'none' => WebhookAuthorizationNone::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
