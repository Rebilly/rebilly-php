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

interface PayoutRequestAllocationOperationRequest extends JsonSerializable
{
    public function getType(): string;

    /**
     * @return string[]
     */
    public function getAllocationIds(): array;

    /**
     * @param string[] $allocationIds
     */
    public function setAllocationIds(array $allocationIds): static;
}
