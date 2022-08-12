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

    public function setCustomerId(string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\Transaction[]
     */
    public function getTransactions(): ?array
    {
        return $this->fields['transactions'] ?? null;
    }

    public function getRetryInstruction(): ?InvoiceRetryInstruction
    {
        return $this->fields['retryInstruction'] ?? null;
    }

    public function setRetryInstruction(null|InvoiceRetryInstruction|array $retryInstruction): self
    {
        if ($retryInstruction !== null && !($retryInstruction instanceof \Rebilly\Sdk\Model\InvoiceRetryInstruction)) {
            $retryInstruction = \Rebilly\Sdk\Model\InvoiceRetryInstruction::from($retryInstruction);
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

    public function setDueReminderTime(null|DateTimeImmutable|string $dueReminderTime): self
    {
        if ($dueReminderTime !== null && !($dueReminderTime instanceof DateTimeImmutable)) {
            $dueReminderTime = new DateTimeImmutable($dueReminderTime);
        }

        $this->fields['dueReminderTime'] = $dueReminderTime;

        return $this;
    }

    public function getDueReminderNumber(): ?int
    {
        return $this->fields['dueReminderNumber'] ?? null;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\LeadSourceLink|\Rebilly\Sdk\Model\OrganizationLink|\Rebilly\Sdk\Model\RecalculateInvoiceLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\SubscriptionLink|\Rebilly\Sdk\Model\TransactionAllocationsLink|\Rebilly\Sdk\Model\WebsiteLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{customer:\Rebilly\Sdk\Model\Customer,website:\Rebilly\Sdk\Model\Website,organization:\Rebilly\Sdk\Model\Organization,leadSource:\Rebilly\Sdk\Model\LeadSource,shippingRate:\Rebilly\Sdk\Model\ShippingRate}
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
     * @param null|\Rebilly\Sdk\Model\Transaction[] $transactions
     */
    private function setTransactions(null|array $transactions): self
    {
        $transactions = $transactions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Transaction ? $value : \Rebilly\Sdk\Model\Transaction::from($value)) : null, $transactions) : null;

        $this->fields['transactions'] = $transactions;

        return $this;
    }

    private function setRevision(null|int $revision): self
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setDueReminderNumber(null|int $dueReminderNumber): self
    {
        $this->fields['dueReminderNumber'] = $dueReminderNumber;

        return $this;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\LeadSourceLink|\Rebilly\Sdk\Model\OrganizationLink|\Rebilly\Sdk\Model\RecalculateInvoiceLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\SubscriptionLink|\Rebilly\Sdk\Model\TransactionAllocationsLink|\Rebilly\Sdk\Model\WebsiteLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{customer:\Rebilly\Sdk\Model\Customer,website:\Rebilly\Sdk\Model\Website,organization:\Rebilly\Sdk\Model\Organization,leadSource:\Rebilly\Sdk\Model\LeadSource,shippingRate:\Rebilly\Sdk\Model\ShippingRate} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof \Rebilly\Sdk\Model\Customer ? $embedded['customer'] : \Rebilly\Sdk\Model\Customer::from($embedded['customer'])) : null;
        $embedded['website'] = isset($embedded['website']) ? ($embedded['website'] instanceof \Rebilly\Sdk\Model\Website ? $embedded['website'] : \Rebilly\Sdk\Model\Website::from($embedded['website'])) : null;
        $embedded['organization'] = isset($embedded['organization']) ? ($embedded['organization'] instanceof \Rebilly\Sdk\Model\Organization ? $embedded['organization'] : \Rebilly\Sdk\Model\Organization::from($embedded['organization'])) : null;
        $embedded['leadSource'] = isset($embedded['leadSource']) ? ($embedded['leadSource'] instanceof \Rebilly\Sdk\Model\LeadSource ? $embedded['leadSource'] : \Rebilly\Sdk\Model\LeadSource::from($embedded['leadSource'])) : null;
        $embedded['shippingRate'] = isset($embedded['shippingRate']) ? ($embedded['shippingRate'] instanceof \Rebilly\Sdk\Model\ShippingRate ? $embedded['shippingRate'] : \Rebilly\Sdk\Model\ShippingRate::from($embedded['shippingRate'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
