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

interface Taxes extends JsonSerializable
{
    public function getCalculator(): string;

    public function getAmount(): ?int;

    /**
     * @return null|TaxItem[]
     */
    public function getItems(): ?array;

    /**
     * @param array[]|TaxItem[] $items
     */
    public function setItems(array $items): static;
}
