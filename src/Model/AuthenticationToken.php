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

interface AuthenticationToken extends JsonSerializable
{
    public function getMode(): string;

    public function getCustomerId(): ?string;

    public function getToken(): ?string;

    public function getOtpRequired(): ?bool;

    public function setOtpRequired(null|bool $otpRequired): static;

    public function getCredentialId(): ?string;

    public function getExpiredTime(): ?DateTimeImmutable;

    public function setExpiredTime(null|DateTimeImmutable|string $expiredTime): static;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
