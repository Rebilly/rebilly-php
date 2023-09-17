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

interface Subscription
{
    public function getId(): ?string;

    public function getOrderType(): string;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    public function getOrganizationId(): ?string;

    public function setOrganizationId(null|string $organizationId): static;

    public function getStatus(): ?string;

    public function getBillingStatus(): ?string;

    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getCurrency(): ?string;

    public function setCurrency(null|string $currency): static;

    public function getInitialInvoiceId(): ?string;

    public function getRecentInvoiceId(): ?string;

    /**
     * @return OrderItem[]
     */
    public function getItems(): array;

    /**
     * @param array[]|OrderItem[] $items
     */
    public function setItems(array $items): static;

    public function getDeliveryAddress(): ?ContactObject;

    public function setDeliveryAddress(null|ContactObject|array $deliveryAddress): static;

    public function getBillingAddress(): ?ContactObject;

    public function setBillingAddress(null|ContactObject|array $billingAddress): static;

    public function getActivationTime(): ?DateTimeImmutable;

    public function getVoidTime(): ?DateTimeImmutable;

    public function getAbandonTime(): ?DateTimeImmutable;

    public function setAbandonTime(null|DateTimeImmutable|string $abandonTime): static;

    /**
     * @return null|string[]
     */
    public function getCouponIds(): ?array;

    /**
     * @param null|string[] $couponIds
     */
    public function setCouponIds(null|array $couponIds): static;

    public function getPoNumber(): ?string;

    public function setPoNumber(null|string $poNumber): static;

    public function getShipping(): ?Shipping;

    public function setShipping(null|Shipping|array $shipping): static;

    public function getNotes(): ?string;

    public function setNotes(null|string $notes): static;

    public function getRevision(): ?int;

    public function getRiskMetadata(): ?RiskMetadata;

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
