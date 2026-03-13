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

class EcoPayzTurkeySettings implements JsonSerializable
{
    use HasMetadata;

    public const VALID_CURRENCY_CAD = 'CAD';

    public const VALID_CURRENCY_EUR = 'EUR';

    public const VALID_CURRENCY_GBP = 'GBP';

    public const VALID_CURRENCY_USD = 'USD';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('validCurrency', $data)) {
            $this->setValidCurrency($data['validCurrency']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getValidCurrency(): string
    {
        return $this->fields['validCurrency'];
    }

    public function setValidCurrency(string $validCurrency): static
    {
        $this->fields['validCurrency'] = $validCurrency;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('validCurrency', $this->fields)) {
            $data['validCurrency'] = $this->fields['validCurrency'];
        }

        return $data;
    }
}
