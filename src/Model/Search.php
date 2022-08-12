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

class Search implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customers', $data)) {
            $this->setCustomers($data['customers']);
        }
        if (array_key_exists('invoices', $data)) {
            $this->setInvoices($data['invoices']);
        }
        if (array_key_exists('orders', $data)) {
            $this->setOrders($data['orders']);
        }
        if (array_key_exists('transactions', $data)) {
            $this->setTransactions($data['transactions']);
        }
        if (array_key_exists('searched', $data)) {
            $this->setSearched($data['searched']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|Customer[]
     */
    public function getCustomers(): ?array
    {
        return $this->fields['customers'] ?? null;
    }

    /**
     * @return null|Invoice[]
     */
    public function getInvoices(): ?array
    {
        return $this->fields['invoices'] ?? null;
    }

    /**
     * @return null|Subscription[]
     */
    public function getOrders(): ?array
    {
        return $this->fields['orders'] ?? null;
    }

    /**
     * @return null|Transaction[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getSearched(): ?array
    {
        return $this->fields['searched'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customers', $this->fields)) {
            $data['customers'] = $this->fields['customers'];
        }
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'];
        }
        if (array_key_exists('orders', $this->fields)) {
            $data['orders'] = $this->fields['orders'];
        }
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'];
        }
        if (array_key_exists('searched', $this->fields)) {
            $data['searched'] = $this->fields['searched'];
        }

        return $data;
    }

    /**
     * @param null|Customer[] $customers
     */
    private function setCustomers(null|array $customers): self
    {
        $customers = $customers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Customer ? $value : Customer::from($value)) : null, $customers) : null;

        $this->fields['customers'] = $customers;

        return $this;
    }

    /**
     * @param null|Invoice[] $invoices
     */
    private function setInvoices(null|array $invoices): self
    {
        $invoices = $invoices !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Invoice ? $value : Invoice::from($value)) : null, $invoices) : null;

        $this->fields['invoices'] = $invoices;

        return $this;
    }

    /**
     * @param null|Subscription[] $orders
     */
    private function setOrders(null|array $orders): self
    {
        $orders = $orders !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Subscription ? $value : Subscription::from($value)) : null, $orders) : null;

        $this->fields['orders'] = $orders;

        return $this;
    }

    /**
     * @param null|Transaction[] $transactions
     */
    private function setTransactions(null|array $transactions): self
    {
        $transactions = $transactions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Transaction ? $value : Transaction::from($value)) : null, $transactions) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    /**
     * @param null|string[] $searched
     */
    private function setSearched(null|array $searched): self
    {
        $searched = $searched !== null ? array_map(fn ($value) => $value ?? null, $searched) : null;

        $this->fields['searched'] = $searched;

        return $this;
    }
}
