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
use JsonSerializable;

class JournalRecord implements JsonSerializable
{
    public const TYPE_AUTOMATED = 'automated';

    public const TYPE_MANUAL = 'manual';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('journalEntryId', $data)) {
            $this->setJournalEntryId($data['journalEntryId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('invoiceId', $data)) {
            $this->setInvoiceId($data['invoiceId']);
        }
        if (array_key_exists('invoiceItemId', $data)) {
            $this->setInvoiceItemId($data['invoiceItemId']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('estimatedAmount', $data)) {
            $this->setEstimatedAmount($data['estimatedAmount']);
        }
        if (array_key_exists('recognizedAmount', $data)) {
            $this->setRecognizedAmount($data['recognizedAmount']);
        }
        if (array_key_exists('debitAccountId', $data)) {
            $this->setDebitAccountId($data['debitAccountId']);
        }
        if (array_key_exists('creditAccountId', $data)) {
            $this->setCreditAccountId($data['creditAccountId']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getJournalEntryId(): string
    {
        return $this->fields['journalEntryId'];
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

    public function getInvoiceId(): string
    {
        return $this->fields['invoiceId'];
    }

    public function setInvoiceId(string $invoiceId): static
    {
        $this->fields['invoiceId'] = $invoiceId;

        return $this;
    }

    public function getInvoiceItemId(): string
    {
        return $this->fields['invoiceItemId'];
    }

    public function setInvoiceItemId(string $invoiceItemId): static
    {
        $this->fields['invoiceItemId'] = $invoiceItemId;

        return $this;
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function getEstimatedAmount(): ?float
    {
        return $this->fields['estimatedAmount'] ?? null;
    }

    public function setEstimatedAmount(null|float|string $estimatedAmount): static
    {
        if (is_string($estimatedAmount)) {
            $estimatedAmount = (float) $estimatedAmount;
        }

        $this->fields['estimatedAmount'] = $estimatedAmount;

        return $this;
    }

    public function getRecognizedAmount(): ?float
    {
        return $this->fields['recognizedAmount'] ?? null;
    }

    public function setRecognizedAmount(null|float|string $recognizedAmount): static
    {
        if (is_string($recognizedAmount)) {
            $recognizedAmount = (float) $recognizedAmount;
        }

        $this->fields['recognizedAmount'] = $recognizedAmount;

        return $this;
    }

    public function getDebitAccountId(): ?string
    {
        return $this->fields['debitAccountId'] ?? null;
    }

    public function setDebitAccountId(null|string $debitAccountId): static
    {
        $this->fields['debitAccountId'] = $debitAccountId;

        return $this;
    }

    public function getCreditAccountId(): ?string
    {
        return $this->fields['creditAccountId'] ?? null;
    }

    public function setCreditAccountId(null|string $creditAccountId): static
    {
        $this->fields['creditAccountId'] = $creditAccountId;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getEmbedded(): ?JournalRecordEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|JournalRecordEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof JournalRecordEmbedded)) {
            $embedded = JournalRecordEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('journalEntryId', $this->fields)) {
            $data['journalEntryId'] = $this->fields['journalEntryId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('invoiceId', $this->fields)) {
            $data['invoiceId'] = $this->fields['invoiceId'];
        }
        if (array_key_exists('invoiceItemId', $this->fields)) {
            $data['invoiceItemId'] = $this->fields['invoiceItemId'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('estimatedAmount', $this->fields)) {
            $data['estimatedAmount'] = $this->fields['estimatedAmount'];
        }
        if (array_key_exists('recognizedAmount', $this->fields)) {
            $data['recognizedAmount'] = $this->fields['recognizedAmount'];
        }
        if (array_key_exists('debitAccountId', $this->fields)) {
            $data['debitAccountId'] = $this->fields['debitAccountId'];
        }
        if (array_key_exists('creditAccountId', $this->fields)) {
            $data['creditAccountId'] = $this->fields['creditAccountId'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setJournalEntryId(string $journalEntryId): static
    {
        $this->fields['journalEntryId'] = $journalEntryId;

        return $this;
    }

    private function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
