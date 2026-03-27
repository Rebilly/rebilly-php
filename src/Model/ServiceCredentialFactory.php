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

class ServiceCredentialFactory
{
    public static function from(array $data = [], array $metadata = []): ServiceCredential
    {
        return match ($data['type']) {
            'avalara' => AvalaraCredential::from($data, $metadata),
            'experian' => ExperianCredential::from($data, $metadata),
            'mailgun' => MailgunCredential::from($data, $metadata),
            'oauth2' => OAuth2Credential::from($data, $metadata),
            'plaid' => PlaidCredential::from($data, $metadata),
            'postmark' => PostmarkCredential::from($data, $metadata),
            'sendgrid' => SendGridCredential::from($data, $metadata),
            'aws-ses' => SESCredential::from($data, $metadata),
            'smtp' => SmtpCredential::from($data, $metadata),
            'taxjar' => TaxJarCredential::from($data, $metadata),
            'webhook' => WebhookCredential::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
