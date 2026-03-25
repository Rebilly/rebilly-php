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
    public static function from(array $data = [], array $metadata = []): PaymentInstruction
    {
        if (isset($data['paymentInstrumentId'])) {
            return PaymentInstructionInstrument::from($data, $metadata);
        }
        if (isset($data['methods'])) {
            return PaymentInstructionMethods::from($data, $metadata);
        }
        if (isset($data['token'])) {
            return PaymentInstructionToken::from($data, $metadata);
        }

        return match ($data['method']) {
            'ach' => BankAccountCreatePlainFactory::from($data, $metadata),
            'payment-card' => PaymentCardCreatePlain::from($data, $metadata),
            default => throw new UnknownDiscriminatorValueException(),
        };
    }
}
