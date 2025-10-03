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

interface Order extends JsonSerializable
{
    public function getType(): string;

    public function getId(): ?string;

    public function getOrganizationId(): ?string;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getActivationInvoiceId(): ?string;

    public function getRecentInvoiceId(): ?string;

    public function getStatus(): ?string;

    /**
     * @return OneTimeSaleItem[]|RecurringOrderItems[]
     */
    public function getItems(): array;

    public function getPoNumber(): ?string;

    public function setPoNumber(null|string $poNumber): static;

    public function getNotes(): ?string;

    public function setNotes(null|string $notes): static;

    public function getBillingAddress(): ?ContactObject;

    public function setBillingAddress(null|ContactObject|array $billingAddress): static;

    public function getDeliveryAddress(): ?ContactObject;

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): static;

    public function getDelinquencyPeriod(): ?string;

    public function setDelinquencyPeriod(null|string $delinquencyPeriod): static;

    /**
     * @return null|string[]
     */
    public function getCouponIds(): ?array;

    /**
     * @param null|string[] $couponIds
     */
    public function setCouponIds(null|array $couponIds): static;

    public function getRiskMetadata(): ?RiskMetadata;

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static;

    public function getActivationTime(): ?DateTimeImmutable;

    public function getCurrency(): ?string;

    public function getShipping(): ?Shipping;

    public function setShipping(null|Shipping|array $shipping): static;

    public function getAbandonTime(): ?DateTimeImmutable;

    public function setAbandonTime(null|DateTimeImmutable|string $abandonTime): static;

    public function getAbandonReminderTime(): ?DateTimeImmutable;

    public function getAbandonReminderNumber(): ?int;

    public function getVoidTime(): ?DateTimeImmutable;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;

    public function getRevision(): ?int;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;

    public function getEmbedded(): null|OneTimeOrderEmbedded|RecurringOrderEmbedded;

    public function setEmbedded(null|array $embedded): static;
}
