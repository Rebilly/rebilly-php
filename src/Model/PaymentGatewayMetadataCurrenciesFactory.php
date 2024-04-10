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

class PaymentGatewayMetadataCurrenciesFactory
{
    public static function from(array $data = []): PaymentGatewayMetadataCurrencies
    {
        return match ($data['mode']) {
            'subset' => PaymentGatewayMetadataCurrenciesSubset::from($data),
            'all' => PaymentGatewayMetadataCurrenciesUnrestricted::from($data),
            'unknown' => PaymentGatewayMetadataCurrenciesUnrestricted::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
