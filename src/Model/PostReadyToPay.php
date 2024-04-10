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

interface PostReadyToPay
{
    public function getWebsiteId(): string;

    public function setWebsiteId(string $websiteId): static;

    public function getBillingAddress(): ?ContactObject;

    public function setBillingAddress(null|ContactObject|array $billingAddress): static;

    public function getRiskMetadata(): RiskMetadata;

    public function setRiskMetadata(RiskMetadata|array $riskMetadata): static;
}
