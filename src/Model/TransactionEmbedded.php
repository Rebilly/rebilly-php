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

class TransactionEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('parentTransaction', $data)) {
            $this->setParentTransaction($data['parentTransaction']);
        }
        if (array_key_exists('childTransactions', $data)) {
            $this->setChildTransactions($data['childTransactions']);
        }
        if (array_key_exists('gatewayAccount', $data)) {
            $this->setGatewayAccount($data['gatewayAccount']);
        }
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('invoices', $data)) {
            $this->setInvoices($data['invoices']);
        }
        if (array_key_exists('organization', $data)) {
            $this->setOrganization($data['organization']);
        }
        if (array_key_exists('dispute', $data)) {
            $this->setDispute($data['dispute']);
        }
        if (array_key_exists('paymentCard', $data)) {
            $this->setPaymentCard($data['paymentCard']);
        }
        if (array_key_exists('bankAccount', $data)) {
            $this->setBankAccount($data['bankAccount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getParentTransaction(): ?object
    {
        return $this->fields['parentTransaction'] ?? null;
    }

    public function setParentTransaction(null|object $parentTransaction): static
    {
        $this->fields['parentTransaction'] = $parentTransaction;

        return $this;
    }

    public function getChildTransactions(): ?array
    {
        return $this->fields['childTransactions'] ?? null;
    }

    public function setChildTransactions(null|array $childTransactions): static
    {
        $this->fields['childTransactions'] = $childTransactions;

        return $this;
    }

    public function getGatewayAccount(): ?object
    {
        return $this->fields['gatewayAccount'] ?? null;
    }

    public function setGatewayAccount(null|object $gatewayAccount): static
    {
        $this->fields['gatewayAccount'] = $gatewayAccount;

        return $this;
    }

    public function getCustomer(): ?object
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|object $customer): static
    {
        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getLeadSource(): ?object
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|object $leadSource): static
    {
        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function getWebsite(): ?object
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|object $website): static
    {
        $this->fields['website'] = $website;

        return $this;
    }

    public function getInvoices(): ?array
    {
        return $this->fields['invoices'] ?? null;
    }

    public function setInvoices(null|array $invoices): static
    {
        $this->fields['invoices'] = $invoices;

        return $this;
    }

    public function getOrganization(): ?object
    {
        return $this->fields['organization'] ?? null;
    }

    public function setOrganization(null|object $organization): static
    {
        $this->fields['organization'] = $organization;

        return $this;
    }

    public function getDispute(): ?object
    {
        return $this->fields['dispute'] ?? null;
    }

    public function setDispute(null|object $dispute): static
    {
        $this->fields['dispute'] = $dispute;

        return $this;
    }

    public function getPaymentCard(): ?object
    {
        return $this->fields['paymentCard'] ?? null;
    }

    public function setPaymentCard(null|object $paymentCard): static
    {
        $this->fields['paymentCard'] = $paymentCard;

        return $this;
    }

    public function getBankAccount(): ?object
    {
        return $this->fields['bankAccount'] ?? null;
    }

    public function setBankAccount(null|object $bankAccount): static
    {
        $this->fields['bankAccount'] = $bankAccount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('parentTransaction', $this->fields)) {
            $data['parentTransaction'] = $this->fields['parentTransaction'];
        }
        if (array_key_exists('childTransactions', $this->fields)) {
            $data['childTransactions'] = $this->fields['childTransactions'];
        }
        if (array_key_exists('gatewayAccount', $this->fields)) {
            $data['gatewayAccount'] = $this->fields['gatewayAccount'];
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
        }
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'];
        }
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization'];
        }
        if (array_key_exists('dispute', $this->fields)) {
            $data['dispute'] = $this->fields['dispute'];
        }
        if (array_key_exists('paymentCard', $this->fields)) {
            $data['paymentCard'] = $this->fields['paymentCard'];
        }
        if (array_key_exists('bankAccount', $this->fields)) {
            $data['bankAccount'] = $this->fields['bankAccount'];
        }

        return $data;
    }
}
