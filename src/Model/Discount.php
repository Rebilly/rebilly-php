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

interface Discount extends JsonSerializable
{
    public function getType(): string;

    public function getContext(): ?string;

    public function setContext(null|string $context): static;
}
