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

interface BankAccountCreatePlain extends PostPaymentInstrumentRequest, PaymentInstruction
{
    public function getAccountNumberType(): string;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    public function getAccountNumber(): string;

    public function setAccountNumber(string $accountNumber): static;

    public function getBankName(): ?string;

    public function setBankName(null|string $bankName): static;

    public function getBic(): ?string;

    public function setBic(null|string $bic): static;

    public function getBillingAddress(): ContactObject;

    public function setBillingAddress(ContactObject|array $billingAddress): static;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;

    public function getRiskMetadata(): ?RiskMetadata;

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static;

    public function getUseAsBackup(): ?bool;

    public function setUseAsBackup(null|bool $useAsBackup): static;
}
