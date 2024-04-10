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

interface ServiceCredential
{
    public function getType(): string;

    public function getId(): ?string;

    public function getHash(): ?string;

    public function getStatus(): ?string;

    public function setStatus(null|string $status): static;

    public function getDeactivationTime(): ?DateTimeImmutable;
}
