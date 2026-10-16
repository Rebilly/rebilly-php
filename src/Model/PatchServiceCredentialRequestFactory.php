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

class PatchServiceCredentialRequestFactory
{
    public static function from(array $data = [], array $metadata = []): PatchServiceCredentialRequest
    {
        return match ($data['type']) {
            'plaid' => PatchPlaidCredential::from($data, $metadata),
            'avalara' => PatchServiceCredential::from($data, $metadata),
            'aws-ses' => PatchServiceCredential::from($data, $metadata),
            'experian' => PatchServiceCredential::from($data, $metadata),
            'mailgun' => PatchServiceCredential::from($data, $metadata),
            'oauth2' => PatchServiceCredential::from($data, $metadata),
            'postmark' => PatchServiceCredential::from($data, $metadata),
            'sendgrid' => PatchServiceCredential::from($data, $metadata),
            'smtp' => PatchServiceCredential::from($data, $metadata),
            'webhook' => PatchServiceCredential::from($data, $metadata),
            'taxjar' => PatchTaxJarCredential::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
