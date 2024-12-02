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

class OrganizationExportResources implements JsonSerializable
{
    public const TYPE_CUSTOMERS = 'customers';

    public const TYPE_USERS = 'users';

    public const TYPE_PAYMENT_INSTRUMENTS = 'payment-instruments';

    public const TYPE_INVOICES = 'invoices';

    public const TYPE_ORDERS = 'orders';

    public const TYPE_TRANSACTIONS = 'transactions';

    public const TYPE_DISPUTES = 'disputes';

    public const TYPE_GATEWAY_ACCOUNTS = 'gateway-accounts';

    public const TYPE_BLOCKLISTS = 'blocklists';

    public const TYPE_LISTS = 'lists';

    public const TYPE_WEBHOOKS = 'webhooks';

    public const TYPE_PRODUCTS = 'products';

    public const TYPE_WEBSITES = 'websites';

    public const TYPE_PLANS = 'plans';

    public const TYPE_CREDIT_MEMOS = 'credit-memos';

    public const TYPE_FILES = 'files';

    public const TYPE_EMAIL_NOTIFICATIONS = 'email-notifications';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('recordCount', $data)) {
            $this->setRecordCount($data['recordCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getRecordCount(): ?int
    {
        return $this->fields['recordCount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('recordCount', $this->fields)) {
            $data['recordCount'] = $this->fields['recordCount'];
        }

        return $data;
    }

    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setRecordCount(null|int $recordCount): static
    {
        $this->fields['recordCount'] = $recordCount;

        return $this;
    }
}
