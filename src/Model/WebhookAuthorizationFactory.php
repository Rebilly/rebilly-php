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
    public static function from(array $data = [], array $metadata = []): WebhookAuthorization
    {
        return match ($data['type']) {
            'basic' => WebhookAuthorizationBasic::from($data, $metadata),
            'digest' => WebhookAuthorizationDigest::from($data, $metadata),
            'none' => WebhookAuthorizationNone::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
