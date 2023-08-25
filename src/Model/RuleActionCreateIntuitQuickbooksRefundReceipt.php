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

class RuleActionCreateIntuitQuickbooksRefundReceipt extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'create-intuit-quickbooks-refund-receipt',
        ] + $data);

        if (array_key_exists('depositAccount', $data)) {
            $this->setDepositAccount($data['depositAccount']);
        }
        if (array_key_exists('department', $data)) {
            $this->setDepartment($data['department']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDepositAccount(): string
    {
        return $this->fields['depositAccount'];
    }

    public function setDepositAccount(string $depositAccount): static
    {
        $this->fields['depositAccount'] = $depositAccount;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->fields['department'] ?? null;
    }

    public function setDepartment(null|string $department): static
    {
        $this->fields['department'] = $department;

        return $this;
    }

    public function getCredentialHash(): string
    {
        return $this->fields['credentialHash'];
    }

    public function setCredentialHash(string $credentialHash): static
    {
        $this->fields['credentialHash'] = $credentialHash;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('depositAccount', $this->fields)) {
            $data['depositAccount'] = $this->fields['depositAccount'];
        }
        if (array_key_exists('department', $this->fields)) {
            $data['department'] = $this->fields['department'];
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
