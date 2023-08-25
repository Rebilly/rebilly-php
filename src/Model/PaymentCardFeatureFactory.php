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
    public static function from(array $data = []): PaymentCardFeature
    {
        return match ($data['name']) {
            'Apple Pay' => ApplePayFeature::from($data),
            'Google Pay' => GooglePayFeature::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
