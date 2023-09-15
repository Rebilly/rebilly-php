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

interface AuthenticationToken
{
    public function getMode(): ?string;

    public function getToken(): ?string;

    public function getOtpRequired(): ?bool;

    public function setOtpRequired(null|bool $otpRequired): static;

    public function getCredentialId(): ?string;

    public function setCredentialId(null|string $credentialId): static;

    public function getExpiredTime(): ?DateTimeImmutable;

    public function setExpiredTime(null|DateTimeImmutable|string $expiredTime): static;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static;
}
