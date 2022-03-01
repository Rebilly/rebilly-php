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

namespace Rebilly\Entities\Transactions;

use DomainException;
use InvalidArgumentException;
use Rebilly\Entities\Transactions\PaymentInstructions\PaymentInstrumentInstruction;
use Rebilly\Entities\Transactions\PaymentInstructions\PaymentMethodsInstruction;
use Rebilly\Entities\Transactions\PaymentInstructions\PaymentTokenInstruction;
use Rebilly\Rest\Resource;

/**
 * Class PaymentInstruction.
 */
abstract class PaymentInstruction extends Resource
{
    public const UNSUPPORTED_INSTRUCTION = 'Unsupported payment instruction';

    public function __construct(array $data = [])
    {
        parent::__construct([$this->getAttributeName() => $data[$this->getAttributeName()] ?? null]);
    }

    /**
     * @param array $data
     *
     * @return PaymentInstruction
     */
    public static function createFromData(array $data): self
    {
        if (isset($data['token'])) {
            return new PaymentTokenInstruction($data);
        }

        if (isset($data['paymentInstrumentId'])) {
            return new PaymentInstrumentInstruction($data);
        }

        if (isset($data['methods'])) {
            return new PaymentMethodsInstruction($data);
        }

        throw new DomainException(self::UNSUPPORTED_INSTRUCTION);
    }

    /**
     * @return string
     */
    abstract protected function getAttributeName();
}
