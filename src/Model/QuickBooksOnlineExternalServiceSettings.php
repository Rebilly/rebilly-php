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

class QuickBooksOnlineExternalServiceSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('invoice', $data)) {
            $this->setInvoice($data['invoice']);
        }
        if (array_key_exists('transaction', $data)) {
            $this->setTransaction($data['transaction']);
        }
        if (array_key_exists('journalEntry', $data)) {
            $this->setJournalEntry($data['journalEntry']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomer(): ?QuickBooksOnlineCustomerExternalServiceSettings
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|QuickBooksOnlineCustomerExternalServiceSettings|array $customer): static
    {
        if ($customer !== null && !($customer instanceof QuickBooksOnlineCustomerExternalServiceSettings)) {
            $customer = QuickBooksOnlineCustomerExternalServiceSettings::from($customer);
        }

        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getInvoice(): ?QuickBooksOnlineInvoiceExternalServiceSettings
    {
        return $this->fields['invoice'] ?? null;
    }

    public function setInvoice(null|QuickBooksOnlineInvoiceExternalServiceSettings|array $invoice): static
    {
        if ($invoice !== null && !($invoice instanceof QuickBooksOnlineInvoiceExternalServiceSettings)) {
            $invoice = QuickBooksOnlineInvoiceExternalServiceSettings::from($invoice);
        }

        $this->fields['invoice'] = $invoice;

        return $this;
    }

    public function getTransaction(): ?QuickBooksOnlineTransactionExternalServiceSettings
    {
        return $this->fields['transaction'] ?? null;
    }

    public function setTransaction(null|QuickBooksOnlineTransactionExternalServiceSettings|array $transaction): static
    {
        if ($transaction !== null && !($transaction instanceof QuickBooksOnlineTransactionExternalServiceSettings)) {
            $transaction = QuickBooksOnlineTransactionExternalServiceSettings::from($transaction);
        }

        $this->fields['transaction'] = $transaction;

        return $this;
    }

    public function getJournalEntry(): ?QuickBooksOnlineJournalEntryExternalServiceSettings
    {
        return $this->fields['journalEntry'] ?? null;
    }

    public function setJournalEntry(null|QuickBooksOnlineJournalEntryExternalServiceSettings|array $journalEntry): static
    {
        if ($journalEntry !== null && !($journalEntry instanceof QuickBooksOnlineJournalEntryExternalServiceSettings)) {
            $journalEntry = QuickBooksOnlineJournalEntryExternalServiceSettings::from($journalEntry);
        }

        $this->fields['journalEntry'] = $journalEntry;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer']?->jsonSerialize();
        }
        if (array_key_exists('invoice', $this->fields)) {
            $data['invoice'] = $this->fields['invoice']?->jsonSerialize();
        }
        if (array_key_exists('transaction', $this->fields)) {
            $data['transaction'] = $this->fields['transaction']?->jsonSerialize();
        }
        if (array_key_exists('journalEntry', $this->fields)) {
            $data['journalEntry'] = $this->fields['journalEntry']?->jsonSerialize();
        }

        return $data;
    }
}
