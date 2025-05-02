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

class OmniMatrixSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('usePreconfiguredAmounts', $data)) {
            $this->setUsePreconfiguredAmounts($data['usePreconfiguredAmounts']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUsePreconfiguredAmounts(): ?bool
    {
        return $this->fields['usePreconfiguredAmounts'] ?? null;
    }

    public function setUsePreconfiguredAmounts(null|bool $usePreconfiguredAmounts): static
    {
        $this->fields['usePreconfiguredAmounts'] = $usePreconfiguredAmounts;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('usePreconfiguredAmounts', $this->fields)) {
            $data['usePreconfiguredAmounts'] = $this->fields['usePreconfiguredAmounts'];
        }

        return $data;
    }
}
