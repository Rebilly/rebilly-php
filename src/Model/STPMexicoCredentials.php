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
    public const BANK_ID_37006 = '37006';

    public const BANK_ID_37009 = '37009';

    public const BANK_ID_37019 = '37019';

    public const BANK_ID_37135 = '37135';

    public const BANK_ID_37166 = '37166';

    public const BANK_ID_37168 = '37168';

    public const BANK_ID_40002 = '40002';

    public const BANK_ID_40012 = '40012';

    public const BANK_ID_40014 = '40014';

    public const BANK_ID_40021 = '40021';

    public const BANK_ID_40030 = '40030';

    public const BANK_ID_40036 = '40036';

    public const BANK_ID_40037 = '40037';

    public const BANK_ID_40042 = '40042';

    public const BANK_ID_40044 = '40044';

    public const BANK_ID_40058 = '40058';

    public const BANK_ID_40059 = '40059';

    public const BANK_ID_40060 = '40060';

    public const BANK_ID_40062 = '40062';

    public const BANK_ID_40072 = '40072';

    public const BANK_ID_40102 = '40102';

    public const BANK_ID_40103 = '40103';

    public const BANK_ID_40106 = '40106';

    public const BANK_ID_40108 = '40108';

    public const BANK_ID_40110 = '40110';

    public const BANK_ID_40112 = '40112';

    public const BANK_ID_40113 = '40113';

    public const BANK_ID_40124 = '40124';

    public const BANK_ID_40126 = '40126';

    public const BANK_ID_40127 = '40127';

    public const BANK_ID_40128 = '40128';

    public const BANK_ID_40129 = '40129';

    public const BANK_ID_40130 = '40130';

    public const BANK_ID_40131 = '40131';

    public const BANK_ID_40132 = '40132';

    public const BANK_ID_40133 = '40133';

    public const BANK_ID_40136 = '40136';

    public const BANK_ID_40137 = '40137';

    public const BANK_ID_40138 = '40138';

    public const BANK_ID_40140 = '40140';

    public const BANK_ID_40141 = '40141';

    public const BANK_ID_40143 = '40143';

    public const BANK_ID_40145 = '40145';

    public const BANK_ID_40147 = '40147';

    public const BANK_ID_40148 = '40148';

    public const BANK_ID_40150 = '40150';

    public const BANK_ID_40151 = '40151';

    public const BANK_ID_40152 = '40152';

    public const BANK_ID_40154 = '40154';

    public const BANK_ID_40155 = '40155';

    public const BANK_ID_40156 = '40156';

    public const BANK_ID_40158 = '40158';

    public const BANK_ID_90600 = '90600';

    public const BANK_ID_90601 = '90601';

    public const BANK_ID_90602 = '90602';

    public const BANK_ID_90605 = '90605';

    public const BANK_ID_90606 = '90606';

    public const BANK_ID_90608 = '90608';

    public const BANK_ID_90613 = '90613';

    public const BANK_ID_90614 = '90614';

    public const BANK_ID_90616 = '90616';

    public const BANK_ID_90617 = '90617';

    public const BANK_ID_90620 = '90620';

    public const BANK_ID_90621 = '90621';

    public const BANK_ID_90623 = '90623';

    public const BANK_ID_90626 = '90626';

    public const BANK_ID_90627 = '90627';

    public const BANK_ID_90628 = '90628';

    public const BANK_ID_90630 = '90630';

    public const BANK_ID_90631 = '90631';

    public const BANK_ID_90634 = '90634';

    public const BANK_ID_90636 = '90636';

    public const BANK_ID_90637 = '90637';

    public const BANK_ID_90638 = '90638';

    public const BANK_ID_90640 = '90640';

    public const BANK_ID_90642 = '90642';

    public const BANK_ID_90646 = '90646';

    public const BANK_ID_90648 = '90648';

    public const BANK_ID_90649 = '90649';

    public const BANK_ID_90652 = '90652';

    public const BANK_ID_90653 = '90653';

    public const BANK_ID_90655 = '90655';

    public const BANK_ID_90656 = '90656';

    public const BANK_ID_90659 = '90659';

    public const BANK_ID_90670 = '90670';

    public const BANK_ID_90671 = '90671';

    public const BANK_ID_90674 = '90674';

    public const BANK_ID_90677 = '90677';

    public const BANK_ID_90678 = '90678';

    public const BANK_ID_90679 = '90679';

    public const BANK_ID_90680 = '90680';

    public const BANK_ID_90681 = '90681';

    public const BANK_ID_90683 = '90683';

    public const BANK_ID_90684 = '90684';

    public const BANK_ID_90685 = '90685';

    public const BANK_ID_90686 = '90686';

    public const BANK_ID_90687 = '90687';

    public const BANK_ID_90689 = '90689';

    public const BANK_ID_90901 = '90901';

    public const BANK_ID_90902 = '90902';

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

    public function getBankId(): int
    {
        return $this->fields['bankId'];
    }

    public function setBankId(int $bankId): static
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
