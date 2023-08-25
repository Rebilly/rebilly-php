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

class PaymentInstructionFactory
{
    public static function from(array $data = []): PaymentInstruction
    {
        if (isset($data['token'])) {
            return PaymentToken::from($data);
        }
        if (isset($data['paymentInstrumentId'])) {
            return PaymentInstructionInstrument::from($data);
        }
        if (isset($data['methods'])) {
            return PaymentMethods::from($data);
        }

        return match ($data['method']) {
            'payment-card' => PaymentCardCreatePlain::from($data),
            'ach' => BankAccountCreatePlain::from($data),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
