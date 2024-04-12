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

interface ReadyToPayPayPalMethodFeature extends JsonSerializable
{
    public function getName(): string;

    public function getPaypalMerchantId(): string;

    public function setPaypalMerchantId(string $paypalMerchantId): static;

    public function getPaypalClientId(): string;

    public function setPaypalClientId(string $paypalClientId): static;

    public function getBillingAgreementToken(): string;

    public function setBillingAgreementToken(string $billingAgreementToken): static;

    public function getExpirationTime(): DateTimeImmutable;

    public function setExpirationTime(DateTimeImmutable|string $expirationTime): static;
}
