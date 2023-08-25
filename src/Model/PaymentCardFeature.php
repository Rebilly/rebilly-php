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

interface PaymentCardFeature
{
    public function getName(): ?string;

    public function setName(null|string $name): static;

    public function getCountry(): ?string;

    public function setCountry(null|string $country): static;
}
