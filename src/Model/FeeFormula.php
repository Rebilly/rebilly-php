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

interface FeeFormula
{
    public function getType(): string;

    public function setType(string $type): static;

    public function getCurrency(): string;

    public function setCurrency(string $currency): static;
}
