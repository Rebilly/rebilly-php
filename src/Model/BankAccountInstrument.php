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

abstract class BankAccountInstrument implements JsonSerializable
{
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
            case 'IBAN':
                return new IBANInstrument($data);
            case 'BBAN':
                return new BBANInstrument($data);
        }

        throw new InvalidArgumentException("Unsupported accountNumberType value: '{$data['accountNumberType']}'");
    }

    public function getAccountNumberType(): ?string
    {
        return $this->fields['accountNumberType'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountNumberType', $this->fields)) {
            $data['accountNumberType'] = $this->fields['accountNumberType'];
        }

        return $data;
    }

    private function setAccountNumberType(null|string $accountNumberType): self
    {
        $this->fields['accountNumberType'] = $accountNumberType;

        return $this;
    }
}
