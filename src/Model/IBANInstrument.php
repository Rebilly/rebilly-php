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

use JsonSerializable;

class IBANInstrument implements BankAccountInstrument, JsonSerializable
{
    public const ACCOUNT_NUMBER_TYPE_IBAN = 'IBAN';

    public const ACCOUNT_TYPE_CHECKING = 'checking';

    public const ACCOUNT_TYPE_SAVINGS = 'savings';

    public const ACCOUNT_TYPE_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('accountNumberType', $data)) {
            $this->setAccountNumberType($data['accountNumberType']);
        }
        if (array_key_exists('accountNumber', $data)) {
            $this->setAccountNumber($data['accountNumber']);
        }
        if (array_key_exists('bic', $data)) {
            $this->setBic($data['bic']);
        }
        if (array_key_exists('bankName', $data)) {
            $this->setBankName($data['bankName']);
        }
        if (array_key_exists('last4', $data)) {
            $this->setLast4($data['last4']);
        }
        if (array_key_exists('routingNumber', $data)) {
            $this->setRoutingNumber($data['routingNumber']);
        }
        if (array_key_exists('accountType', $data)) {
            $this->setAccountType($data['accountType']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAccountNumberType(): string
    {
        return $this->fields['accountNumberType'];
    }

    public function setAccountNumberType(string $accountNumberType): static
    {
        $this->fields['accountNumberType'] = $accountNumberType;

        return $this;
    }

    public function getAccountNumber(): string
    {
        return $this->fields['accountNumber'];
    }

    public function setAccountNumber(string $accountNumber): static
    {
        $this->fields['accountNumber'] = $accountNumber;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->fields['bic'] ?? null;
    }

    public function setBic(null|string $bic): static
    {
        $this->fields['bic'] = $bic;

        return $this;
    }

    public function getBankName(): ?string
    {
        return $this->fields['bankName'] ?? null;
    }

    public function setBankName(null|string $bankName): static
    {
        $this->fields['bankName'] = $bankName;

        return $this;
    }

    public function getLast4(): ?string
    {
        return $this->fields['last4'] ?? null;
    }

    public function getRoutingNumber(): string
    {
        return $this->fields['routingNumber'];
    }

    public function setRoutingNumber(string $routingNumber): static
    {
        $this->fields['routingNumber'] = $routingNumber;

        return $this;
    }

    public function getAccountType(): string
    {
        return $this->fields['accountType'];
    }

    public function setAccountType(string $accountType): static
    {
        $this->fields['accountType'] = $accountType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountNumberType', $this->fields)) {
            $data['accountNumberType'] = $this->fields['accountNumberType'];
        }
        if (array_key_exists('accountNumber', $this->fields)) {
            $data['accountNumber'] = $this->fields['accountNumber'];
        }
        if (array_key_exists('bic', $this->fields)) {
            $data['bic'] = $this->fields['bic'];
        }
        if (array_key_exists('bankName', $this->fields)) {
            $data['bankName'] = $this->fields['bankName'];
        }
        if (array_key_exists('last4', $this->fields)) {
            $data['last4'] = $this->fields['last4'];
        }
        if (array_key_exists('routingNumber', $this->fields)) {
            $data['routingNumber'] = $this->fields['routingNumber'];
        }
        if (array_key_exists('accountType', $this->fields)) {
            $data['accountType'] = $this->fields['accountType'];
        }

        return $data;
    }

    private function setLast4(null|string $last4): static
    {
        $this->fields['last4'] = $last4;

        return $this;
    }
}
