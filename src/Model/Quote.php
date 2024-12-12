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

interface Quote extends JsonSerializable
{
    public function getAction(): string;

    public function getId(): ?string;

    public function getType(): ?string;

    /**
     * @return null|string[]
     */
    public function getAcceptanceConditions(): ?array;

    /**
     * @param null|string[] $acceptanceConditions
     */
    public function setAcceptanceConditions(null|array $acceptanceConditions): static;

    /**
     * @return null|QuoteChangeOrderAcceptanceFulfillment[]|QuoteCreateOrderAcceptanceFulfillment[]|QuoteReactivateOrderAcceptanceFulfillment[]
     */
    public function getAcceptanceFulfillment(): ?array;

    public function getSubscriptionId(): ?string;

    public function getInvoiceId(): ?string;

    public function getStatus(): ?string;

    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    /**
     * @return QuoteChangeOrderItems[]|QuoteCreateOrderItems[]|QuoteReactivateOrderItems[]
     */
    public function getItems(): array;

    public function getInvoicePreview(): null|QuoteChangeOrderInvoicePreview|QuoteCreateOrderInvoicePreview|QuoteReactivateOrderInvoicePreview;

    public function setInvoicePreview(null|array $invoicePreview): static;

    public function getAutopay(): ?bool;

    public function setAutopay(null|bool $autopay): static;

    public function getPaymentTerms(): ?string;

    public function setPaymentTerms(null|string $paymentTerms): static;

    public function getExpirationTime(): ?DateTimeImmutable;

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): static;

    public function getIssuedTime(): ?DateTimeImmutable;

    public function getAcceptedTime(): ?DateTimeImmutable;

    public function getRejectedTime(): ?DateTimeImmutable;

    public function getCanceledTime(): ?DateTimeImmutable;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    public function getRedirectUrl(): ?string;

    public function setRedirectUrl(null|string $redirectUrl): static;

    public function getSignature(): null|QuoteChangeOrderSignature|QuoteCreateOrderSignature|QuoteReactivateOrderSignature;

    public function setSignature(null|array $signature): static;

    public function getShipping(): ?Shipping;

    public function setShipping(null|Shipping|array $shipping): static;

    public function getTax(): ?Taxes;

    public function setTax(null|Taxes|array $tax): static;

    /**
     * @return null|string[]
     */
    public function getCouponIds(): ?array;

    /**
     * @param null|string[] $couponIds
     */
    public function setCouponIds(null|array $couponIds): static;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;

    public function getEmbedded(): null|QuoteChangeOrderEmbedded|QuoteCreateOrderEmbedded|QuoteReactivateOrderEmbedded;

    public function setEmbedded(null|array $embedded): static;
}
