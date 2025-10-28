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

interface RecurringOrderItems extends JsonSerializable
{
    public function getType(): string;

    public function getId(): ?string;

    public function getPlanId(): ?string;

    public function setPlanId(null|string $planId): static;

    public function getProductId(): ?string;

    public function getPlan(): ConfigurablePlan;

    public function setPlan(ConfigurablePlan|array $plan): static;

    public function getQuantity(): ?int;

    public function setQuantity(null|int $quantity): static;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;
}
