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

class BBANType extends BankAccountCreatePlain
{
    public const METHOD_ACH = 'ach';

    public const ACCOUNT_TYPE_CHECKING = 'checking';

    public const ACCOUNT_TYPE_SAVINGS = 'savings';

    public const ACCOUNT_TYPE_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'accountNumberType' => 'BBAN',
        ] + $data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('accountNumber', $data)) {
            $this->setAccountNumber($data['accountNumber']);
        }
        if (array_key_exists('routingNumber', $data)) {
            $this->setRoutingNumber($data['routingNumber']);
        }
        if (array_key_exists('accountType', $data)) {
            $this->setAccountType($data['accountType']);
        }
        if (array_key_exists('bankName', $data)) {
            $this->setBankName($data['bankName']);
        }
        if (array_key_exists('bic', $data)) {
            $this->setBic($data['bic']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('useAsBackup', $data)) {
            $this->setUseAsBackup($data['useAsBackup']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

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

    public function getBankName(): ?string
    {
        return $this->fields['bankName'] ?? null;
    }

    public function setBankName(null|string $bankName): static
    {
        $this->fields['bankName'] = $bankName;

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

    public function getBillingAddress(): ContactObject
    {
        return $this->fields['billingAddress'];
    }

    public function setBillingAddress(ContactObject|array $billingAddress): static
    {
        if (!($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    public function getUseAsBackup(): ?bool
    {
        return $this->fields['useAsBackup'] ?? null;
    }

    public function setUseAsBackup(null|bool $useAsBackup): static
    {
        $this->fields['useAsBackup'] = $useAsBackup;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('accountNumber', $this->fields)) {
            $data['accountNumber'] = $this->fields['accountNumber'];
        }
        if (array_key_exists('routingNumber', $this->fields)) {
            $data['routingNumber'] = $this->fields['routingNumber'];
        }
        if (array_key_exists('accountType', $this->fields)) {
            $data['accountType'] = $this->fields['accountType'];
        }
        if (array_key_exists('bankName', $this->fields)) {
            $data['bankName'] = $this->fields['bankName'];
        }
        if (array_key_exists('bic', $this->fields)) {
            $data['bic'] = $this->fields['bic'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('useAsBackup', $this->fields)) {
            $data['useAsBackup'] = $this->fields['useAsBackup'];
        }

        return parent::jsonSerialize() + $data;
    }
}
