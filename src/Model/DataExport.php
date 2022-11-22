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
use InvalidArgumentException;
use JsonSerializable;

abstract class DataExport implements JsonSerializable
{
    public const RESOURCE_TRANSACTIONS = 'transactions';

    public const RESOURCE_CUSTOMERS = 'customers';

    public const RESOURCE_SUBSCRIPTIONS = 'subscriptions';

    public const RESOURCE_INVOICES = 'invoices';

    public const RESOURCE_INVOICE_ITEMS = 'invoiceItems';

    public const RESOURCE_REVENUE_AUDIT = 'revenueAudit';

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

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('resource', $data)) {
            $this->setResource($data['resource']);
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
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['resource']) {
            case 'transactions':
                return new Transactions($data);
            case 'subscriptions':
                return new Subscriptions($data);
            case 'customers':
                return new Customers($data);
            case 'revenueAudit':
                return new RevenueAudit($data);
            case 'invoiceItems':
                return new InvoiceItems($data);
            case 'invoices':
                return new Invoices($data);
        }

        throw new InvalidArgumentException("Unsupported resource value: '{$data['resource']}'");
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    /**
     * @psalm-return self::RESOURCE_* $resource
     */
    public function getResource(): string
    {
        return $this->fields['resource'];
    }

    /**
     * @psalm-return self::FORMAT_* $format
     */
    public function getFormat(): string
    {
        return $this->fields['format'];
    }

    /**
     * @psalm-param self::FORMAT_* $format
     */
    public function setFormat(string $format): self
    {
        $this->fields['format'] = $format;

        return $this;
    }

    public function getArguments(): ?DataExportArguments
    {
        return $this->fields['arguments'] ?? null;
    }

    public function setArguments(null|DataExportArguments|array $arguments): self
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
    public function setEmailNotification(null|array $emailNotification): self
    {
        $emailNotification = $emailNotification !== null ? array_map(fn ($value) => $value ?? null, $emailNotification) : null;

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
    public function setFields(null|array $fields): self
    {
        $fields = $fields !== null ? array_map(fn ($value) => $value ?? null, $fields) : null;

        $this->fields['fields'] = $fields;

        return $this;
    }

    public function getRecurring(): ?DataExportRecurring
    {
        return $this->fields['recurring'] ?? null;
    }

    public function setRecurring(null|DataExportRecurring|array $recurring): self
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

    public function getRecordCount(): ?int
    {
        return $this->fields['recordCount'] ?? null;
    }

    public function getScheduledTime(): ?DateTimeImmutable
    {
        return $this->fields['scheduledTime'] ?? null;
    }

    public function setScheduledTime(null|DateTimeImmutable|string $scheduledTime): self
    {
        if ($scheduledTime !== null && !($scheduledTime instanceof DateTimeImmutable)) {
            $scheduledTime = new DateTimeImmutable($scheduledTime);
        }

        $this->fields['scheduledTime'] = $scheduledTime;

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

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @return null|array<LinkFileDownload|LinkSelf|LinkSignedLink|LinkUser>
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
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('resource', $this->fields)) {
            $data['resource'] = $this->fields['resource'];
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
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::RESOURCE_* $resource
     */
    private function setResource(string $resource): self
    {
        $this->fields['resource'] = $resource;

        return $this;
    }

    private function setUserId(null|string $userId): self
    {
        $this->fields['userId'] = $userId;

        return $this;
    }

    private function setRecordCount(null|int $recordCount): self
    {
        $this->fields['recordCount'] = $recordCount;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @param null|array<LinkFileDownload|LinkSelf|LinkSignedLink|LinkUser> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
