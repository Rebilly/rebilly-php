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

class SubscriptionOrOneTimeSaleFactory
{
    public static function from(array $data = []): SubscriptionOrOneTimeSale
    {
        return match ($data['orderType']) {
            'one-time-order' => OneTimeSale::from($data),
            'subscription-order' => Subscription::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
