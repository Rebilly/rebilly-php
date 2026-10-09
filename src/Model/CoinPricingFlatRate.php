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

class CoinPricingFlatRate implements CoinPricing
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('coinsPerFiatMinor', $data)) {
            $this->setCoinsPerFiatMinor($data['coinsPerFiatMinor']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getFormula(): string
    {
        return 'flat-rate';
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

    public function jsonSerialize(): array
    {
        $data = [
            'formula' => 'flat-rate',
        ];
        if (array_key_exists('coinsPerFiatMinor', $this->fields)) {
            $data['coinsPerFiatMinor'] = $this->fields['coinsPerFiatMinor'];
        }

        return $data;
    }
}
