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

class PostServiceCredentialRequestFactory
{
    public static function from(array $data = [], array $metadata = []): PostServiceCredentialRequest
    {
        return match ($data['type']) {
            'avalara' => PostAvalaraCredential::from($data, $metadata),
            'aws-ses' => PostAwsSesCredential::from($data, $metadata),
            'experian' => PostExperianCredential::from($data, $metadata),
            'mailgun' => PostMailgunCredential::from($data, $metadata),
            'oauth2' => PostOAuth2Credential::from($data, $metadata),
            'plaid' => PostPlaidCredential::from($data, $metadata),
            'postmark' => PostPostmarkCredential::from($data, $metadata),
            'sendgrid' => PostSendGridCredential::from($data, $metadata),
            'smtp' => PostSmtpCredential::from($data, $metadata),
            'taxjar' => PostTaxJarCredential::from($data, $metadata),
            'webhook' => PostWebhookCredential::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
