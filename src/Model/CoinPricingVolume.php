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

use Rebilly\Sdk\Trait\HasMetadata;

class CoinPricingVolume implements CoinPricing
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('brackets', $data)) {
            $this->setBrackets($data['brackets']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getFormula(): string
    {
        return 'volume';
    }

    /**
     * @return CoinPricingVolumeBracket[]
     */
    public function getBrackets(): array
    {
        return $this->fields['brackets'];
    }

    /**
     * @param array[]|CoinPricingVolumeBracket[] $brackets
     */
    public function setBrackets(array $brackets): static
    {
        $brackets = array_map(
            fn ($value) => $value instanceof CoinPricingVolumeBracket ? $value : CoinPricingVolumeBracket::from($value),
            $brackets,
        );

        $this->fields['brackets'] = $brackets;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'formula' => 'volume',
        ];
        if (array_key_exists('brackets', $this->fields)) {
            $data['brackets'] = array_map(
                static fn (CoinPricingVolumeBracket $coinPricingVolumeBracket) => $coinPricingVolumeBracket->jsonSerialize(),
                $this->fields['brackets'],
            );
        }

        return $data;
    }
}
