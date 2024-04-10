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

class InvoicesDataExport implements DataExport, JsonSerializable
{
    public const FORMAT_CSV = 'csv';

    public const FORMAT_JSON = 'json';

    public const FORMAT_JSON_API = 'json-api';

    public const FORMAT_XML = 'xml';

    public const FORMAT_PDF = 'pdf';

    public const STATUS_PENDING = 'pending';

    public const STATUS_QUEUED = 'queued';

    public const STATUS_PROCESSING = 'processing';

    public const STATUS_COMPLETED = 'completed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('format', $data)) {
            $this->setFormat($data['format']);
        }
        if (array_key_exists('arguments', $data)) {
            $this->setArguments($data['arguments']);
        }
        if (array_key_exists('emailNotification', $data)) {
            $this->setEmailNotification($data['emailNotification']);
        }
        if (array_key_exists('fields', $data)) {
            $this->setFields($data['fields']);
        }
        if (array_key_exists('recurring', $data)) {
            $this->setRecurring($data['recurring']);
        }
        if (array_key_exists('userId', $data)) {
            $this->setUserId($data['userId']);
        }
        if (array_key_exists('fileId', $data)) {
            $this->setFileId($data['fileId']);
        }
        if (array_key_exists('recordCount', $data)) {
            $this->setRecordCount($data['recordCount']);
        }
        if (array_key_exists('scheduledTime', $data)) {
            $this->setScheduledTime($data['scheduledTime']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('dateRange', $data)) {
            $this->setDateRange($data['dateRange']);
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

    public function getResource(): string
    {
        return 'invoices';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getFormat(): string
    {
        return $this->fields['format'];
    }

    public function setFormat(string $format): static
    {
        $this->fields['format'] = $format;

        return $this;
    }

    public function getArguments(): ?DataExportArguments
    {
        return $this->fields['arguments'] ?? null;
    }

    public function setArguments(null|DataExportArguments|array $arguments): static
    {
        if ($arguments !== null && !($arguments instanceof DataExportArguments)) {
            $arguments = DataExportArguments::from($arguments);
        }

        $this->fields['arguments'] = $arguments;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getEmailNotification(): ?array
    {
        return $this->fields['emailNotification'] ?? null;
    }

    /**
     * @param null|string[] $emailNotification
     */
    public function setEmailNotification(null|array $emailNotification): static
    {
        $this->fields['emailNotification'] = $emailNotification;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getFields(): ?array
    {
        return $this->fields['fields'] ?? null;
    }

    /**
     * @param null|string[] $fields
     */
    public function setFields(null|array $fields): static
    {
        $this->fields['fields'] = $fields;

        return $this;
    }

    public function getRecurring(): ?DataExportRecurring
    {
        return $this->fields['recurring'] ?? null;
    }

    public function setRecurring(null|DataExportRecurring|array $recurring): static
    {
        if ($recurring !== null && !($recurring instanceof DataExportRecurring)) {
            $recurring = DataExportRecurring::from($recurring);
        }

        $this->fields['recurring'] = $recurring;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->fields['userId'] ?? null;
    }

    public function getFileId(): ?string
    {
        return $this->fields['fileId'] ?? null;
    }

    public function getRecordCount(): ?int
    {
        return $this->fields['recordCount'] ?? null;
    }

    public function getScheduledTime(): ?DateTimeImmutable
    {
        return $this->fields['scheduledTime'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getDateRange(): ?DataExportDateRange
    {
        return $this->fields['dateRange'] ?? null;
    }

    public function setDateRange(null|DataExportDateRange|array $dateRange): static
    {
        if ($dateRange !== null && !($dateRange instanceof DataExportDateRange)) {
            $dateRange = DataExportDateRange::from($dateRange);
        }

        $this->fields['dateRange'] = $dateRange;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?InvoicesDataExportEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|InvoicesDataExportEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof InvoicesDataExportEmbedded)) {
            $embedded = InvoicesDataExportEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'resource' => 'invoices',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('format', $this->fields)) {
            $data['format'] = $this->fields['format'];
        }
        if (array_key_exists('arguments', $this->fields)) {
            $data['arguments'] = $this->fields['arguments']?->jsonSerialize();
        }
        if (array_key_exists('emailNotification', $this->fields)) {
            $data['emailNotification'] = $this->fields['emailNotification'];
        }
        if (array_key_exists('fields', $this->fields)) {
            $data['fields'] = $this->fields['fields'];
        }
        if (array_key_exists('recurring', $this->fields)) {
            $data['recurring'] = $this->fields['recurring']?->jsonSerialize();
        }
        if (array_key_exists('userId', $this->fields)) {
            $data['userId'] = $this->fields['userId'];
        }
        if (array_key_exists('fileId', $this->fields)) {
            $data['fileId'] = $this->fields['fileId'];
        }
        if (array_key_exists('recordCount', $this->fields)) {
            $data['recordCount'] = $this->fields['recordCount'];
        }
        if (array_key_exists('scheduledTime', $this->fields)) {
            $data['scheduledTime'] = $this->fields['scheduledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('dateRange', $this->fields)) {
            $data['dateRange'] = $this->fields['dateRange']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setUserId(null|string $userId): static
    {
        $this->fields['userId'] = $userId;

        return $this;
    }

    private function setFileId(null|string $fileId): static
    {
        $this->fields['fileId'] = $fileId;

        return $this;
    }

    private function setRecordCount(null|int $recordCount): static
    {
        $this->fields['recordCount'] = $recordCount;

        return $this;
    }

    private function setScheduledTime(null|DateTimeImmutable|string $scheduledTime): static
    {
        if ($scheduledTime !== null && !($scheduledTime instanceof DateTimeImmutable)) {
            $scheduledTime = new DateTimeImmutable($scheduledTime);
        }

        $this->fields['scheduledTime'] = $scheduledTime;

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

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

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
