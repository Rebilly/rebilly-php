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

abstract class BankAccountCreatePlain extends PaymentInstruction
{
    public const ACCOUNT_NUMBER_TYPE_IBAN = 'IBAN';

    public const ACCOUNT_NUMBER_TYPE_BBAN = 'BBAN';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('accountNumberType', $data)) {
            $this->setAccountNumberType($data['accountNumberType']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['accountNumberType']) {
            case 'BBAN':
                return new BBANType($data);
            case 'IBAN':
                return new IBANType($data);
        }

        throw new InvalidArgumentException("Unsupported accountNumberType value: '{$data['accountNumberType']}'");
    }

    /**
     * @psalm-return self::ACCOUNT_NUMBER_TYPE_* $accountNumberType
     */
    public function getAccountNumberType(): string
    {
        return $this->fields['accountNumberType'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountNumberType', $this->fields)) {
            $data['accountNumberType'] = $this->fields['accountNumberType'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @psalm-param self::ACCOUNT_NUMBER_TYPE_* $accountNumberType
     */
    private function setAccountNumberType(string $accountNumberType): self
    {
        $this->fields['accountNumberType'] = $accountNumberType;

        return $this;
    }
}
