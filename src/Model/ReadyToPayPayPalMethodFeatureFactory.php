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

class ReadyToPayPayPalMethodFeatureFactory
{
    public static function from(array $data = []): ReadyToPayPayPalMethodFeature
    {
        return match ($data['name']) {
            'PayPal billing agreement' => PayPalBillingAgreementFeature::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
