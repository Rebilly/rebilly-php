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
    public function getType(): string;

    public function getId(): ?string;

    /**
     * @return null|string[]
     */
    public function getAcceptanceConditions(): ?array;

    /**
     * @param null|string[] $acceptanceConditions
     */
    public function setAcceptanceConditions(null|array $acceptanceConditions): static;

    /**
     * @return null|ChangeQuoteAcceptanceFulfillment[]|CreationQuoteAcceptanceFulfillment[]|ReactivationQuoteAcceptanceFulfillment[]
     */
    public function getAcceptanceFulfillment(): ?array;

    public function getInvoiceId(): ?string;

    public function getStatus(): ?string;

    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    public function getOrder(): ChangeQuoteOrder|CreationQuoteOrder|ReactivationQuoteOrder;

    public function setOrder(array $order): static;

    public function getInvoicePreview(): null|ChangeQuoteInvoicePreview|CreationQuoteInvoicePreview|ReactivationQuoteInvoicePreview;

    public function setInvoicePreview(null|array $invoicePreview): static;

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

    public function getSignature(): null|ChangeQuoteSignature|CreationQuoteSignature|ReactivationQuoteSignature;

    public function setSignature(null|array $signature): static;

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

    public function getEmbedded(): null|ChangeQuoteEmbedded|CreationQuoteEmbedded|ReactivationQuoteEmbedded;

    public function setEmbedded(null|array $embedded): static;
}
