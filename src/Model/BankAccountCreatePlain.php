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

use InvalidArgumentException;
use JsonSerializable;

abstract class BankAccountCreatePlain implements PostPaymentInstrumentRequest, PaymentInstruction, JsonSerializable
{
    public const ACCOUNT_NUMBER_TYPE_IBAN = 'IBAN';

    public const ACCOUNT_NUMBER_TYPE_BBAN = 'BBAN';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('accountNumberType', $data)) {
            $this->setAccountNumberType($data['accountNumberType']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['accountNumberType']) {
            case 'BBAN':
                return BBANType::from($data);
            case 'IBAN':
                return IBANType::from($data);
        }

        throw new InvalidArgumentException("Unsupported accountNumberType value: '{$data['accountNumberType']}'");
    }

    public function getMethod(): string
    {
        return 'ach';
    }

    public function getAccountNumberType(): string
    {
        return $this->fields['accountNumberType'];
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'ach',
        ];
        if (array_key_exists('accountNumberType', $this->fields)) {
            $data['accountNumberType'] = $this->fields['accountNumberType'];
        }

        return $data;
    }

    private function setAccountNumberType(string $accountNumberType): static
    {
        $this->fields['accountNumberType'] = $accountNumberType;

        return $this;
    }
}
