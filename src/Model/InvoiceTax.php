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

interface InvoiceTax
{
    public function getCalculator(): string;

    public function setCalculator(string $calculator): static;

    public function getAmount(): ?int;
}
