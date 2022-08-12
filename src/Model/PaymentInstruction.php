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

use DomainException;

abstract class PaymentInstruction
{
    protected function __construct(?array $data = null)
    {
    }

    public static function from(array $data): self
    {
        if (isset($data['token'])) {
            return new PaymentToken($data);
        }

        if (isset($data['paymentInstrumentId'])) {
            return new PaymentInstructionInstrument($data);
        }

        if (isset($data['methods'])) {
            return new PaymentMethods($data);
        }

        throw new DomainException('Unsupported payment instruction');
    }

    public function jsonSerialize(): array
    {
        return  [];
    }
}
