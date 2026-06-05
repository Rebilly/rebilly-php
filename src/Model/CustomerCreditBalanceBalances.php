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
use Rebilly\Sdk\Trait\HasMetadata;

class CustomerCreditBalanceBalances implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('unallocatedAmount', $data)) {
            $this->setUnallocatedAmount($data['unallocatedAmount']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getUnallocatedAmount(): float
    {
        return $this->fields['unallocatedAmount'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('unallocatedAmount', $this->fields)) {
            $data['unallocatedAmount'] = $this->fields['unallocatedAmount'];
        }

        return $data;
    }

    private function setUnallocatedAmount(float|string $unallocatedAmount): static
    {
        if (is_string($unallocatedAmount)) {
            $unallocatedAmount = (float) $unallocatedAmount;
        }

        $this->fields['unallocatedAmount'] = $unallocatedAmount;

        return $this;
    }
}
