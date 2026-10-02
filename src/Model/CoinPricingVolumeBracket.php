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

class CoinPricingVolumeBracket implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('coinsPerFiatMinor', $data)) {
            $this->setCoinsPerFiatMinor($data['coinsPerFiatMinor']);
        }
        if (array_key_exists('maxAmount', $data)) {
            $this->setMaxAmount($data['maxAmount']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCoinsPerFiatMinor(): int
    {
        return $this->fields['coinsPerFiatMinor'];
    }

    public function setCoinsPerFiatMinor(int $coinsPerFiatMinor): static
    {
        $this->fields['coinsPerFiatMinor'] = $coinsPerFiatMinor;

        return $this;
    }

    public function getMaxAmount(): ?float
    {
        return $this->fields['maxAmount'] ?? null;
    }

    public function setMaxAmount(null|float|string $maxAmount): static
    {
        if (is_string($maxAmount)) {
            $maxAmount = (float) $maxAmount;
        }

        $this->fields['maxAmount'] = $maxAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('coinsPerFiatMinor', $this->fields)) {
            $data['coinsPerFiatMinor'] = $this->fields['coinsPerFiatMinor'];
        }
        if (array_key_exists('maxAmount', $this->fields)) {
            $data['maxAmount'] = $this->fields['maxAmount'];
        }

        return $data;
    }
}
