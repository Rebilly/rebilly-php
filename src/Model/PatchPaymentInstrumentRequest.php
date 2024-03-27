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

interface PatchPaymentInstrumentRequest
{
    public function getBillingAddress(): ?ContactObject;

    public function setBillingAddress(null|ContactObject|array $billingAddress): static;

    public function getCustomFields(): ?array;

    public function setCustomFields(null|array $customFields): static;

    public function getUseAsBackup(): ?bool;

    public function setUseAsBackup(null|bool $useAsBackup): static;
}
