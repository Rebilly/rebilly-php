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

class RuleActionUpdateIntuitQuickbooksInvoice extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'update-intuit-quickbooks-invoice',
        ] + $data);

        if (array_key_exists('unearnedRevenueAccount', $data)) {
            $this->setUnearnedRevenueAccount($data['unearnedRevenueAccount']);
        }
        if (array_key_exists('taxesAccount', $data)) {
            $this->setTaxesAccount($data['taxesAccount']);
        }
        if (array_key_exists('discountsAccount', $data)) {
            $this->setDiscountsAccount($data['discountsAccount']);
        }
        if (array_key_exists('department', $data)) {
            $this->setDepartment($data['department']);
        }
        if (array_key_exists('template', $data)) {
            $this->setTemplate($data['template']);
        }
        if (array_key_exists('credentialHash', $data)) {
            $this->setCredentialHash($data['credentialHash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUnearnedRevenueAccount(): string
    {
        return $this->fields['unearnedRevenueAccount'];
    }

    public function setUnearnedRevenueAccount(string $unearnedRevenueAccount): static
    {
        $this->fields['unearnedRevenueAccount'] = $unearnedRevenueAccount;

        return $this;
    }

    public function getTaxesAccount(): ?string
    {
        return $this->fields['taxesAccount'] ?? null;
    }

    public function setTaxesAccount(null|string $taxesAccount): static
    {
        $this->fields['taxesAccount'] = $taxesAccount;

        return $this;
    }

    public function getDiscountsAccount(): ?string
    {
        return $this->fields['discountsAccount'] ?? null;
    }

    public function setDiscountsAccount(null|string $discountsAccount): static
    {
        $this->fields['discountsAccount'] = $discountsAccount;

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

    public function getTemplate(): ?RuleActionUpdateIntuitQuickbooksInvoiceTemplate
    {
        return $this->fields['template'] ?? null;
    }

    public function setTemplate(null|RuleActionUpdateIntuitQuickbooksInvoiceTemplate|array $template): static
    {
        if ($template !== null && !($template instanceof RuleActionUpdateIntuitQuickbooksInvoiceTemplate)) {
            $template = RuleActionUpdateIntuitQuickbooksInvoiceTemplate::from($template);
        }

        $this->fields['template'] = $template;

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
        if (array_key_exists('unearnedRevenueAccount', $this->fields)) {
            $data['unearnedRevenueAccount'] = $this->fields['unearnedRevenueAccount'];
        }
        if (array_key_exists('taxesAccount', $this->fields)) {
            $data['taxesAccount'] = $this->fields['taxesAccount'];
        }
        if (array_key_exists('discountsAccount', $this->fields)) {
            $data['discountsAccount'] = $this->fields['discountsAccount'];
        }
        if (array_key_exists('department', $this->fields)) {
            $data['department'] = $this->fields['department'];
        }
        if (array_key_exists('template', $this->fields)) {
            $data['template'] = $this->fields['template']?->jsonSerialize();
        }
        if (array_key_exists('credentialHash', $this->fields)) {
            $data['credentialHash'] = $this->fields['credentialHash'];
        }

        return parent::jsonSerialize() + $data;
    }
}
