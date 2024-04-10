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

    public function getParentTransaction(): ?Transaction
    {
        return $this->fields['parentTransaction'] ?? null;
    }

    public function setParentTransaction(null|Transaction|array $parentTransaction): static
    {
        if ($parentTransaction !== null && !($parentTransaction instanceof Transaction)) {
            $parentTransaction = Transaction::from($parentTransaction);
        }

        $this->fields['parentTransaction'] = $parentTransaction;

        return $this;
    }

    /**
     * @return null|Transaction[]
     */
    public function getChildTransactions(): ?array
    {
        return $this->fields['childTransactions'] ?? null;
    }

    /**
     * @param null|array[]|Transaction[] $childTransactions
     */
    public function setChildTransactions(null|array $childTransactions): static
    {
        $childTransactions = $childTransactions !== null ? array_map(
            fn ($value) => $value instanceof Transaction ? $value : Transaction::from($value),
            $childTransactions,
        ) : null;

        $this->fields['childTransactions'] = $childTransactions;

        return $this;
    }

    public function getGatewayAccount(): ?GatewayAccount
    {
        return $this->fields['gatewayAccount'] ?? null;
    }

    public function setGatewayAccount(null|GatewayAccount|array $gatewayAccount): static
    {
        if ($gatewayAccount !== null && !($gatewayAccount instanceof GatewayAccount)) {
            $gatewayAccount = GatewayAccount::from($gatewayAccount);
        }

        $this->fields['gatewayAccount'] = $gatewayAccount;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|Customer|array $customer): static
    {
        if ($customer !== null && !($customer instanceof Customer)) {
            $customer = Customer::from($customer);
        }

        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getLeadSource(): ?LeadSource
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|LeadSource|array $leadSource): static
    {
        if ($leadSource !== null && !($leadSource instanceof LeadSource)) {
            $leadSource = LeadSource::from($leadSource);
        }

        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function getWebsite(): ?Website
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|Website|array $website): static
    {
        if ($website !== null && !($website instanceof Website)) {
            $website = Website::from($website);
        }

        $this->fields['website'] = $website;

        return $this;
    }

    /**
     * @return null|Invoice[]
     */
    public function getInvoices(): ?array
    {
        return $this->fields['invoices'] ?? null;
    }

    /**
     * @param null|array[]|Invoice[] $invoices
     */
    public function setInvoices(null|array $invoices): static
    {
        $invoices = $invoices !== null ? array_map(
            fn ($value) => $value instanceof Invoice ? $value : Invoice::from($value),
            $invoices,
        ) : null;

        $this->fields['invoices'] = $invoices;

        return $this;
    }

    public function getOrganization(): ?Organization
    {
        return $this->fields['organization'] ?? null;
    }

    public function setOrganization(null|Organization|array $organization): static
    {
        if ($organization !== null && !($organization instanceof Organization)) {
            $organization = Organization::from($organization);
        }

        $this->fields['organization'] = $organization;

        return $this;
    }

    public function getDispute(): ?Dispute
    {
        return $this->fields['dispute'] ?? null;
    }

    public function setDispute(null|Dispute|array $dispute): static
    {
        if ($dispute !== null && !($dispute instanceof Dispute)) {
            $dispute = Dispute::from($dispute);
        }

        $this->fields['dispute'] = $dispute;

        return $this;
    }

    public function getPaymentCard(): ?PaymentCard
    {
        return $this->fields['paymentCard'] ?? null;
    }

    public function setPaymentCard(null|PaymentCard|array $paymentCard): static
    {
        if ($paymentCard !== null && !($paymentCard instanceof PaymentCard)) {
            $paymentCard = PaymentCard::from($paymentCard);
        }

        $this->fields['paymentCard'] = $paymentCard;

        return $this;
    }

    public function getBankAccount(): ?BankAccount
    {
        return $this->fields['bankAccount'] ?? null;
    }

    public function setBankAccount(null|BankAccount|array $bankAccount): static
    {
        if ($bankAccount !== null && !($bankAccount instanceof BankAccount)) {
            $bankAccount = BankAccount::from($bankAccount);
        }

        $this->fields['bankAccount'] = $bankAccount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('parentTransaction', $this->fields)) {
            $data['parentTransaction'] = $this->fields['parentTransaction']?->jsonSerialize();
        }
        if (array_key_exists('childTransactions', $this->fields)) {
            $data['childTransactions'] = $this->fields['childTransactions'];
        }
        if (array_key_exists('gatewayAccount', $this->fields)) {
            $data['gatewayAccount'] = $this->fields['gatewayAccount']?->jsonSerialize();
        }
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource']?->jsonSerialize();
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website']?->jsonSerialize();
        }
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'];
        }
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization']?->jsonSerialize();
        }
        if (array_key_exists('dispute', $this->fields)) {
            $data['dispute'] = $this->fields['dispute']?->jsonSerialize();
        }
        if (array_key_exists('paymentCard', $this->fields)) {
            $data['paymentCard'] = $this->fields['paymentCard']?->jsonSerialize();
        }
        if (array_key_exists('bankAccount', $this->fields)) {
            $data['bankAccount'] = $this->fields['bankAccount']?->jsonSerialize();
        }

        return $data;
    }
}
