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

interface CompositeToken extends JsonSerializable
{
    public function getMethod(): string;

    public function getBillingAddress(): ?ContactObject;

    public function getId(): ?string;

    public function getIsUsed(): ?bool;

    public function getRiskMetadata(): ?RiskMetadata;

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static;

    public function getLeadSource(): ?LeadSource;

    public function setLeadSource(null|LeadSource|array $leadSource): static;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    public function getUsageTime(): ?DateTimeImmutable;

    public function getExpirationTime(): ?DateTimeImmutable;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
