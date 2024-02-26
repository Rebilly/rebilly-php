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

interface Quote
{
    public function getId(): ?string;

    public function getType(): ?string;

    public function getAction(): string;

    /**
     * @return null|string[]
     */
    public function getAcceptanceConditions(): ?array;

    /**
     * @param null|string[] $acceptanceConditions
     */
    public function setAcceptanceConditions(null|array $acceptanceConditions): static;

    /**
     * @return null|QuoteCreateOrderAcceptanceFulfillment[]
     */
    public function getAcceptanceFulfillment(): ?array;

    public function getInvoiceId(): ?string;

    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    /**
     * @return QuoteCreateOrderItems[]
     */
    public function getItems(): array;

    /**
     * @param array[]|QuoteCreateOrderItems[] $items
     */
    public function setItems(array $items): static;

    public function getInvoicePreview(): ?QuoteCreateOrderInvoicePreview;

    public function setInvoicePreview(null|QuoteCreateOrderInvoicePreview|array $invoicePreview): static;

    public function getPaymentTerms(): ?string;

    public function setPaymentTerms(null|string $paymentTerms): static;

    public function getExpirationTime(): ?DateTimeImmutable;

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): static;

    public function getIssuedTime(): ?DateTimeImmutable;

    public function getAcceptedTime(): ?DateTimeImmutable;

    public function getRejectedTime(): ?DateTimeImmutable;

    public function getCanceledTime(): ?DateTimeImmutable;

    public function getRedirectUrl(): ?string;

    public function setRedirectUrl(null|string $redirectUrl): static;

    public function getSignature(): ?QuoteCreateOrderSignature;

    public function setSignature(null|QuoteCreateOrderSignature|array $signature): static;

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

    public function getEmbedded(): ?QuoteCreateOrderEmbedded;

    public function setEmbedded(null|QuoteCreateOrderEmbedded|array $embedded): static;
}
