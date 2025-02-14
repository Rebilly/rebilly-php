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

interface ServicePeriodAnchorInstruction extends JsonSerializable
{
    public function getMethod(): string;

    public function getDay(): int|string;

    public function getTime(): ?string;

    public function setTime(null|string $time): static;
}
