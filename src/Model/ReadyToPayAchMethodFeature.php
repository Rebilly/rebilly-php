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

use DateTimeImmutable;
use JsonSerializable;

interface ReadyToPayAchMethodFeature extends JsonSerializable
{
    public function getName(): string;

    public function getLinkToken(): string;

    public function setLinkToken(string $linkToken): static;

    public function getExpirationTime(): DateTimeImmutable;

    public function setExpirationTime(DateTimeImmutable|string $expirationTime): static;
}
