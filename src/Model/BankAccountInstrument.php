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

interface BankAccountInstrument
{
    public function getAccountNumberType(): string;

    public function getBic(): ?string;

    public function setBic(null|string $bic): static;

    public function getBankName(): ?string;

    public function setBankName(null|string $bankName): static;

    public function getLast4(): ?string;
}
