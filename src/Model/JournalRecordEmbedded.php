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

class JournalRecordEmbedded implements JsonSerializable
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
        if (array_key_exists('invoiceItem', $data)) {
            $this->setInvoiceItem($data['invoiceItem']);
        }
        if (array_key_exists('debitAccount', $data)) {
            $this->setDebitAccount($data['debitAccount']);
        }
        if (array_key_exists('creditAccount', $data)) {
            $this->setCreditAccount($data['creditAccount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getInvoice(): ?Invoice
    {
        return $this->fields['invoice'] ?? null;
    }

    public function setInvoice(null|Invoice|array $invoice): static
    {
        if ($invoice !== null && !($invoice instanceof Invoice)) {
            $invoice = Invoice::from($invoice);
        }

        $this->fields['invoice'] = $invoice;

        return $this;
    }

    public function getInvoiceItem(): ?InvoiceItem
    {
        return $this->fields['invoiceItem'] ?? null;
    }

    public function setInvoiceItem(null|InvoiceItem|array $invoiceItem): static
    {
        if ($invoiceItem !== null && !($invoiceItem instanceof InvoiceItem)) {
            $invoiceItem = InvoiceItem::from($invoiceItem);
        }

        $this->fields['invoiceItem'] = $invoiceItem;

        return $this;
    }

    public function getDebitAccount(): ?JournalAccount
    {
        return $this->fields['debitAccount'] ?? null;
    }

    public function setDebitAccount(null|JournalAccount|array $debitAccount): static
    {
        if ($debitAccount !== null && !($debitAccount instanceof JournalAccount)) {
            $debitAccount = JournalAccount::from($debitAccount);
        }

        $this->fields['debitAccount'] = $debitAccount;

        return $this;
    }

    public function getCreditAccount(): ?JournalAccount
    {
        return $this->fields['creditAccount'] ?? null;
    }

    public function setCreditAccount(null|JournalAccount|array $creditAccount): static
    {
        if ($creditAccount !== null && !($creditAccount instanceof JournalAccount)) {
            $creditAccount = JournalAccount::from($creditAccount);
        }

        $this->fields['creditAccount'] = $creditAccount;

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
        if (array_key_exists('invoiceItem', $this->fields)) {
            $data['invoiceItem'] = $this->fields['invoiceItem']?->jsonSerialize();
        }
        if (array_key_exists('debitAccount', $this->fields)) {
            $data['debitAccount'] = $this->fields['debitAccount']?->jsonSerialize();
        }
        if (array_key_exists('creditAccount', $this->fields)) {
            $data['creditAccount'] = $this->fields['creditAccount']?->jsonSerialize();
        }

        return $data;
    }
}
