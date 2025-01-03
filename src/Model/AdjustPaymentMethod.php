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

interface AdjustPaymentMethod extends JsonSerializable
{
    public function getPaymentMethod(): string;

    public function getFeature(): ?string;

    public function setFeature(null|string $feature): static;
}
