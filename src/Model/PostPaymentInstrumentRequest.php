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

interface PostPaymentInstrumentRequest extends JsonSerializable
{
    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    public function getUseAsBackup(): ?bool;

    public function setUseAsBackup(null|bool $useAsBackup): static;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;
}
