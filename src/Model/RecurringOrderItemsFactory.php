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

class RecurringOrderItemsFactory
{
    public static function from(array $data = []): RecurringOrderItems
    {
        return match ($data['type']) {
            'one-time-sale' => OneTimeSaleItem::from($data),
            'subscription' => SubscriptionItem::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
