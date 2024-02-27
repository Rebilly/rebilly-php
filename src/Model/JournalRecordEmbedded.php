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

    public function getCustomer(): null|object|array
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|object|array $customer): static
    {
        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getInvoice(): null|object|array
    {
        return $this->fields['invoice'] ?? null;
    }

    public function setInvoice(null|object|array $invoice): static
    {
        $this->fields['invoice'] = $invoice;

        return $this;
    }

    public function getInvoiceItem(): null|object|array
    {
        return $this->fields['invoiceItem'] ?? null;
    }

    public function setInvoiceItem(null|object|array $invoiceItem): static
    {
        $this->fields['invoiceItem'] = $invoiceItem;

        return $this;
    }

    public function getDebitAccount(): null|object|array
    {
        return $this->fields['debitAccount'] ?? null;
    }

    public function setDebitAccount(null|object|array $debitAccount): static
    {
        $this->fields['debitAccount'] = $debitAccount;

        return $this;
    }

    public function getCreditAccount(): null|object|array
    {
        return $this->fields['creditAccount'] ?? null;
    }

    public function setCreditAccount(null|object|array $creditAccount): static
    {
        $this->fields['creditAccount'] = $creditAccount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }
        if (array_key_exists('invoice', $this->fields)) {
            $data['invoice'] = $this->fields['invoice'];
        }
        if (array_key_exists('invoiceItem', $this->fields)) {
            $data['invoiceItem'] = $this->fields['invoiceItem'];
        }
        if (array_key_exists('debitAccount', $this->fields)) {
            $data['debitAccount'] = $this->fields['debitAccount'];
        }
        if (array_key_exists('creditAccount', $this->fields)) {
            $data['creditAccount'] = $this->fields['creditAccount'];
        }

        return $data;
    }
}
