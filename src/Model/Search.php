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
     * @return null|SubscriptionOrOneTimeSale[]
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
            $data['customers'] = $this->fields['customers'] !== null
                ? array_map(
                    static fn (Customer $customer) => $customer->jsonSerialize(),
                    $this->fields['customers'],
                )
                : null;
        }
        if (array_key_exists('invoices', $this->fields)) {
            $data['invoices'] = $this->fields['invoices'] !== null
                ? array_map(
                    static fn (Invoice $invoice) => $invoice->jsonSerialize(),
                    $this->fields['invoices'],
                )
                : null;
        }
        if (array_key_exists('orders', $this->fields)) {
            $data['orders'] = $this->fields['orders'] !== null
                ? array_map(
                    static fn (SubscriptionOrOneTimeSale $subscriptionOrOneTimeSale) => $subscriptionOrOneTimeSale->jsonSerialize(),
                    $this->fields['orders'],
                )
                : null;
        }
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'] !== null
                ? array_map(
                    static fn (Transaction $transaction) => $transaction->jsonSerialize(),
                    $this->fields['transactions'],
                )
                : null;
        }
        if (array_key_exists('searched', $this->fields)) {
            $data['searched'] = $this->fields['searched'];
        }

        return $data;
    }

    /**
     * @param null|array[]|Customer[] $customers
     */
    private function setCustomers(null|array $customers): static
    {
        $customers = $customers !== null ? array_map(
            fn ($value) => $value instanceof Customer ? $value : Customer::from($value),
            $customers,
        ) : null;

        $this->fields['customers'] = $customers;

        return $this;
    }

    /**
     * @param null|array[]|Invoice[] $invoices
     */
    private function setInvoices(null|array $invoices): static
    {
        $invoices = $invoices !== null ? array_map(
            fn ($value) => $value instanceof Invoice ? $value : Invoice::from($value),
            $invoices,
        ) : null;

        $this->fields['invoices'] = $invoices;

        return $this;
    }

    /**
     * @param null|array[]|SubscriptionOrOneTimeSale[] $orders
     */
    private function setOrders(null|array $orders): static
    {
        $orders = $orders !== null ? array_map(
            fn ($value) => $value instanceof SubscriptionOrOneTimeSale ? $value : SubscriptionOrOneTimeSaleFactory::from($value),
            $orders,
        ) : null;

        $this->fields['orders'] = $orders;

        return $this;
    }

    /**
     * @param null|array[]|Transaction[] $transactions
     */
    private function setTransactions(null|array $transactions): static
    {
        $transactions = $transactions !== null ? array_map(
            fn ($value) => $value instanceof Transaction ? $value : Transaction::from($value),
            $transactions,
        ) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    /**
     * @param null|string[] $searched
     */
    private function setSearched(null|array $searched): static
    {
        $this->fields['searched'] = $searched;

        return $this;
    }
}
