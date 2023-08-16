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

use DateTimeImmutable;
use DateTimeInterface;

class Invoice extends CommonInvoice
{
    public const TYPE_INITIAL = 'initial';

    public const TYPE_RENEWAL = 'renewal';

    public const TYPE_INTERIM = 'interim';

    public const TYPE_CANCELLATION = 'cancellation';

    public const TYPE_ONE_TIME = 'one-time';

    public const TYPE_REFUND = 'refund';

    public const TYPE_CHARGE = 'charge';

    public const TYPE_ONE_TIME_SALE = 'one-time-sale';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('transactions', $data)) {
            $this->setTransactions($data['transactions']);
        }
        if (array_key_exists('retryInstruction', $data)) {
            $this->setRetryInstruction($data['retryInstruction']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('dueReminderTime', $data)) {
            $this->setDueReminderTime($data['dueReminderTime']);
        }
        if (array_key_exists('dueReminderNumber', $data)) {
            $this->setDueReminderNumber($data['dueReminderNumber']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @return null|Transaction[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    public function getRetryInstruction(): ?InvoiceRetryInstruction
    {
        return $this->fields['retryInstruction'] ?? null;
    }

    public function setRetryInstruction(null|InvoiceRetryInstruction|array $retryInstruction): static
    {
        if ($retryInstruction !== null && !($retryInstruction instanceof InvoiceRetryInstruction)) {
            $retryInstruction = InvoiceRetryInstruction::from($retryInstruction);
        }

        $this->fields['retryInstruction'] = $retryInstruction;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getDueReminderTime(): ?DateTimeImmutable
    {
        return $this->fields['dueReminderTime'] ?? null;
    }

    public function getDueReminderNumber(): ?int
    {
        return $this->fields['dueReminderNumber'] ?? null;
    }

    /**
     * @return null|array<CustomerLink|LeadSourceLink|OrganizationLink|RecalculateInvoiceLink|SelfLink|SubscriptionLink|TransactionAllocationsLink|WebsiteLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{customer:Customer,website:Website,organization:Organization,leadSource:LeadSource,shippingRate:ShippingRate}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('transactions', $this->fields)) {
            $data['transactions'] = $this->fields['transactions'];
        }
        if (array_key_exists('retryInstruction', $this->fields)) {
            $data['retryInstruction'] = $this->fields['retryInstruction']?->jsonSerialize();
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('dueReminderTime', $this->fields)) {
            $data['dueReminderTime'] = $this->fields['dueReminderTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('dueReminderNumber', $this->fields)) {
            $data['dueReminderNumber'] = $this->fields['dueReminderNumber'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return parent::jsonSerialize() + $data;
    }

    /**
     * @param null|Transaction[] $transactions
     */
    private function setTransactions(null|array $transactions): static
    {
        $transactions = $transactions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Transaction ? $value : Transaction::from($value)) : null, $transactions) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setDueReminderTime(null|DateTimeImmutable|string $dueReminderTime): static
    {
        if ($dueReminderTime !== null && !($dueReminderTime instanceof DateTimeImmutable)) {
            $dueReminderTime = new DateTimeImmutable($dueReminderTime);
        }

        $this->fields['dueReminderTime'] = $dueReminderTime;

        return $this;
    }

    private function setDueReminderNumber(null|int $dueReminderNumber): static
    {
        $this->fields['dueReminderNumber'] = $dueReminderNumber;

        return $this;
    }

    /**
     * @param null|array<CustomerLink|LeadSourceLink|OrganizationLink|RecalculateInvoiceLink|SelfLink|SubscriptionLink|TransactionAllocationsLink|WebsiteLink> $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{customer:Customer,website:Website,organization:Organization,leadSource:LeadSource,shippingRate:ShippingRate} $embedded
     */
    private function setEmbedded(null|array $embedded): static
    {
        if ($embedded !== null) {
            $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof Customer ? $embedded['customer'] : Customer::from($embedded['customer'])) : null;
            $embedded['website'] = isset($embedded['website']) ? ($embedded['website'] instanceof Website ? $embedded['website'] : Website::from($embedded['website'])) : null;
            $embedded['organization'] = isset($embedded['organization']) ? ($embedded['organization'] instanceof Organization ? $embedded['organization'] : Organization::from($embedded['organization'])) : null;
            $embedded['leadSource'] = isset($embedded['leadSource']) ? ($embedded['leadSource'] instanceof LeadSource ? $embedded['leadSource'] : LeadSource::from($embedded['leadSource'])) : null;
            $embedded['shippingRate'] = isset($embedded['shippingRate']) ? ($embedded['shippingRate'] instanceof ShippingRate ? $embedded['shippingRate'] : ShippingRate::from($embedded['shippingRate'])) : null;
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
