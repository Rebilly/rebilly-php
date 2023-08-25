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

class STPMexicoCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('companyName', $data)) {
            $this->setCompanyName($data['companyName']);
        }
        if (array_key_exists('beneficiaryName', $data)) {
            $this->setBeneficiaryName($data['beneficiaryName']);
        }
        if (array_key_exists('bankId', $data)) {
            $this->setBankId($data['bankId']);
        }
        if (array_key_exists('bankAccountNumber', $data)) {
            $this->setBankAccountNumber($data['bankAccountNumber']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        if (array_key_exists('keyPassphrase', $data)) {
            $this->setKeyPassphrase($data['keyPassphrase']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCompanyName(): string
    {
        return $this->fields['companyName'];
    }

    public function setCompanyName(string $companyName): static
    {
        $this->fields['companyName'] = $companyName;

        return $this;
    }

    public function getBeneficiaryName(): string
    {
        return $this->fields['beneficiaryName'];
    }

    public function setBeneficiaryName(string $beneficiaryName): static
    {
        $this->fields['beneficiaryName'] = $beneficiaryName;

        return $this;
    }

    public function getBankId(): string
    {
        return $this->fields['bankId'];
    }

    public function setBankId(string $bankId): static
    {
        $this->fields['bankId'] = $bankId;

        return $this;
    }

    public function getBankAccountNumber(): string
    {
        return $this->fields['bankAccountNumber'];
    }

    public function setBankAccountNumber(string $bankAccountNumber): static
    {
        $this->fields['bankAccountNumber'] = $bankAccountNumber;

        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->fields['privateKey'];
    }

    public function setPrivateKey(string $privateKey): static
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function getKeyPassphrase(): string
    {
        return $this->fields['keyPassphrase'];
    }

    public function setKeyPassphrase(string $keyPassphrase): static
    {
        $this->fields['keyPassphrase'] = $keyPassphrase;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('companyName', $this->fields)) {
            $data['companyName'] = $this->fields['companyName'];
        }
        if (array_key_exists('beneficiaryName', $this->fields)) {
            $data['beneficiaryName'] = $this->fields['beneficiaryName'];
        }
        if (array_key_exists('bankId', $this->fields)) {
            $data['bankId'] = $this->fields['bankId'];
        }
        if (array_key_exists('bankAccountNumber', $this->fields)) {
            $data['bankAccountNumber'] = $this->fields['bankAccountNumber'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }
        if (array_key_exists('keyPassphrase', $this->fields)) {
            $data['keyPassphrase'] = $this->fields['keyPassphrase'];
        }

        return $data;
    }
}
