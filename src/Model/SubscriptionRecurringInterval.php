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

class SubscriptionRecurringInterval implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('periodAnchorInstruction', $data)) {
            $this->setPeriodAnchorInstruction($data['periodAnchorInstruction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPeriodAnchorInstruction(): ?ServicePeriodAnchorInstruction
    {
        return $this->fields['periodAnchorInstruction'] ?? null;
    }

    public function setPeriodAnchorInstruction(null|ServicePeriodAnchorInstruction|array $periodAnchorInstruction): static
    {
        if ($periodAnchorInstruction !== null && !($periodAnchorInstruction instanceof ServicePeriodAnchorInstruction)) {
            $periodAnchorInstruction = ServicePeriodAnchorInstructionFactory::from($periodAnchorInstruction);
        }

        $this->fields['periodAnchorInstruction'] = $periodAnchorInstruction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('periodAnchorInstruction', $this->fields)) {
            $data['periodAnchorInstruction'] = $this->fields['periodAnchorInstruction']?->jsonSerialize();
        }

        return $data;
    }
}
