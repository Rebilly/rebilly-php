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

class PaymentCardFeatureFactory
{
    public static function from(array $data = [], array $metadata = []): PaymentCardFeature
    {
        return match ($data['name']) {
            'Apple Pay' => ApplePayFeature::from($data, $metadata),
            'Google Pay' => GooglePayFeature::from($data, $metadata),
            'Samsung Pay' => SamsungPayFeature::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
