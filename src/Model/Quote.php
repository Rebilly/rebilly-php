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

    public function getSubscriptionId(): ?string;

    public function getInvoiceId(): ?string;

    public function getStatus(): ?string;

    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

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

    public function getRedirectUrl(): ?string;

    public function setRedirectUrl(null|string $redirectUrl): static;

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
}
