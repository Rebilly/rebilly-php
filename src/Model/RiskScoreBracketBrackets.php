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

interface RiskScoreBracketBrackets extends JsonSerializable
{
    public function getStart(): ?int;

    public function setStart(null|int $start): static;

    public function getEnd(): ?int;

    public function setEnd(null|int $end): static;

    public function getValue(): ?int;

    public function setValue(null|int $value): static;
}
