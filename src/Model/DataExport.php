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
use JsonSerializable;

interface DataExport extends JsonSerializable
{
    public function getResource(): string;

    public function getId(): ?string;

    public function getName(): string;

    public function setName(string $name): static;

    public function getFormat(): string;

    public function setFormat(string $format): static;

    public function getArguments(): ?DataExportArguments;

    public function setArguments(null|DataExportArguments|array $arguments): static;

    /**
     * @return null|string[]
     */
    public function getEmailNotification(): ?array;

    /**
     * @param null|string[] $emailNotification
     */
    public function setEmailNotification(null|array $emailNotification): static;

    /**
     * @return null|string[]
     */
    public function getFields(): ?array;

    /**
     * @param null|string[] $fields
     */
    public function setFields(null|array $fields): static;

    public function getRecurring(): ?DataExportRecurring;

    public function setRecurring(null|DataExportRecurring|array $recurring): static;

    public function getUserId(): ?string;

    public function getFileId(): ?string;

    public function getRecordCount(): ?int;

    public function getScheduledTime(): ?DateTimeImmutable;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    public function getStatus(): ?string;

    public function getDateRange(): ?DataExportDateRange;

    public function setDateRange(null|DataExportDateRange|array $dateRange): static;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;

    public function getEmbedded(): null|AmlChecksDataExportEmbedded|CustomersDataExportEmbedded|DisputesDataExportEmbedded|InvoiceItemsDataExportEmbedded|InvoicesDataExportEmbedded|JournalRecordsDataExportEmbedded|RevenueAuditDataExportEmbedded|SubscriptionsDataExportEmbedded|TransactionsDataExportEmbedded;

    public function setEmbedded(null|array $embedded): static;
}
