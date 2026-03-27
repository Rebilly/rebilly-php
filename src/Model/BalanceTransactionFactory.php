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

class BalanceTransactionFactory
{
    public static function from(array $data = [], array $metadata = []): BalanceTransaction
    {
        return match ($data['type']) {
            'buy-fee' => BuyFeeTransaction::from($data, $metadata),
            'charge' => ChargeTransaction::from($data, $metadata),
            'refund' => RefundTransaction::from($data, $metadata),
            'reverse' => ReverseTransaction::from($data, $metadata),
            'risk-reserve-release' => RiskReserveReleaseTransaction::from($data, $metadata),
            'risk-reserve' => RiskReserveTransaction::from($data, $metadata),
            'sell-fee' => SellFeeTransaction::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
