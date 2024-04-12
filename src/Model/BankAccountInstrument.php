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

use JsonSerializable;

interface BankAccountInstrument extends JsonSerializable
{
    public function getAccountNumberType(): string;

    public function getAccountNumber(): string;

    public function setAccountNumber(string $accountNumber): static;

    public function getBic(): ?string;

    public function setBic(null|string $bic): static;

    public function getBankName(): ?string;

    public function setBankName(null|string $bankName): static;

    public function getLast4(): ?string;
}
