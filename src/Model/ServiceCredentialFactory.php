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
    public static function from(array $data = []): ServiceCredential
    {
        return match ($data['type']) {
            'avalara' => AvalaraCredential::from($data),
            'aws-ses' => SESCredential::from($data),
            'experian' => ExperianCredential::from($data),
            'mailgun' => MailgunCredential::from($data),
            'oauth2' => OAuth2Credential::from($data),
            'plaid' => PlaidCredential::from($data),
            'postmark' => PostmarkCredential::from($data),
            'sendgrid' => SendGridCredential::from($data),
            'smtp' => SmtpCredential::from($data),
            'taxjar' => TaxJarCredential::from($data),
            'webhook' => WebhookCredential::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
