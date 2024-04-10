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
    public static function from(array $data = []): BalanceTransaction
    {
        return match ($data['type']) {
            'buy-fee' => BuyFeeTransaction::from($data),
            'charge' => ChargeTransaction::from($data),
            'refund' => RefundTransaction::from($data),
            'reverse' => ReverseTransaction::from($data),
            'risk-reserve-release' => RiskReserveReleaseTransaction::from($data),
            'risk-reserve' => RiskReserveTransaction::from($data),
            'sell-fee' => SellFeeTransaction::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
