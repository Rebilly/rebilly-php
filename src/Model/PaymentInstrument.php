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

interface PaymentInstrument extends JsonSerializable
{
    public function getMethod(): string;

    public function getId(): ?string;

    public function getCustomerId(): ?string;

    public function setCustomerId(string $customerId): static;

    public function getBillingAddress(): ?ContactObject;

    public function setBillingAddress(ContactObject|array $billingAddress): static;

    public function getUseAsBackup(): ?bool;

    public function setUseAsBackup(null|bool $useAsBackup): static;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;

    public function getStickyGatewayAccountId(): ?string;

    public function getRiskMetadata(): ?RiskMetadata;

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static;

    public function getRevision(): ?int;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
