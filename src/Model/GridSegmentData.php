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

class GridSegmentData implements JsonSerializable
{
    public const PAGE_DATA_TABLES = 'data-tables';

    public const PAGE_CUSTOMER_DETAILS = 'customer-details';

    public const TYPE_CUSTOMERS = 'customers';

    public const TYPE_INVOICES = 'invoices';

    public const TYPE_TRANSACTIONS = 'transactions';

    public const TYPE_SUBSCRIPTIONS = 'subscriptions';

    public const TYPE_ORDERS = 'orders';

    public const TYPE_API_LOGS = 'api-logs';

    public const TYPE_COUPON_REDEMPTIONS = 'coupon-redemptions';

    public const TYPE_WEBHOOK_LOGS = 'webhook-logs';

    public const TYPE_TAX_LOGS = 'tax-logs';

    public const TYPE_CREDIT_MEMOS = 'credit-memos';

    public const TYPE_KYC = 'kyc';

    public const TYPE_JOURNAL_ENTRY = 'journal-entry';

    public const TYPE_AML = 'aml';

    public const TYPE_PAYOUT_REQUESTS = 'payout-requests';

    public const TYPE_PAYOUT_ALLOCATIONS = 'payout-allocations';

    public const TYPE_PAYOUT_REQUEST_BATCHES = 'payout-request-batches';

    public const TYPE_ORGANIZATIONS = 'organizations';

    public const TYPE_QUOTES = 'quotes';

    public const TYPE_DEPOSIT_REQUESTS = 'deposit-requests';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('columns', $data)) {
            $this->setColumns($data['columns']);
        }
        if (array_key_exists('filters', $data)) {
            $this->setFilters($data['filters']);
        }
        if (array_key_exists('page', $data)) {
            $this->setPage($data['page']);
        }
        if (array_key_exists('sort', $data)) {
            $this->setSort($data['sort']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getColumns(): ?array
    {
        return $this->fields['columns'] ?? null;
    }

    /**
     * @param null|string[] $columns
     */
    public function setColumns(null|array $columns): static
    {
        $this->fields['columns'] = $columns;

        return $this;
    }

    public function getFilters(): ?string
    {
        return $this->fields['filters'] ?? null;
    }

    public function setFilters(null|string $filters): static
    {
        $this->fields['filters'] = $filters;

        return $this;
    }

    public function getPage(): ?string
    {
        return $this->fields['page'] ?? null;
    }

    public function setPage(null|string $page): static
    {
        $this->fields['page'] = $page;

        return $this;
    }

    public function getSort(): ?string
    {
        return $this->fields['sort'] ?? null;
    }

    public function setSort(null|string $sort): static
    {
        $this->fields['sort'] = $sort;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('columns', $this->fields)) {
            $data['columns'] = $this->fields['columns'];
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }
        if (array_key_exists('page', $this->fields)) {
            $data['page'] = $this->fields['page'];
        }
        if (array_key_exists('sort', $this->fields)) {
            $data['sort'] = $this->fields['sort'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }
}
