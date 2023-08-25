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
            'basic' => Basic::from($data),
            'digest' => Digest::from($data),
            'none' => WebhookAuthorizationNone::from($data),
            'oauth1' => Oauth1::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
