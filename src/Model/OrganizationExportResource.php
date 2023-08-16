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

class OrganizationExportResource implements JsonSerializable
{
    public const NAME_CUSTOMERS = 'customers';

    public const NAME_USERS = 'users';

    public const NAME_PAYMENT_INSTRUMENTS = 'payment-instruments';

    public const NAME_INVOICES = 'invoices';

    public const NAME_ORDERS = 'orders';

    public const NAME_TRANSACTIONS = 'transactions';

    public const NAME_DISPUTES = 'disputes';

    public const NAME_GATEWAY_ACCOUNTS = 'gateway-accounts';

    public const NAME_BLOCKLISTS = 'blocklists';

    public const NAME_LISTS = 'lists';

    public const NAME_WEBHOOKS = 'webhooks';

    public const NAME_PRODUCTS = 'products';

    public const NAME_WEBSITES = 'websites';

    public const NAME_PLANS = 'plans';

    public const NAME_CREDIT_MEMOS = 'credit-memos';

    public const NAME_FILES = 'files';

    public const NAME_EMAIL_NOTIFICATIONS = 'email-notifications';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('recordCount', $data)) {
            $this->setRecordCount($data['recordCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::NAME_*|null $name
     */
    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function getRecordCount(): ?int
    {
        return $this->fields['recordCount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('recordCount', $this->fields)) {
            $data['recordCount'] = $this->fields['recordCount'];
        }

        return $data;
    }

    /**
     * @psalm-param self::NAME_*|null $name
     */
    private function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    private function setRecordCount(null|int $recordCount): static
    {
        $this->fields['recordCount'] = $recordCount;

        return $this;
    }
}
