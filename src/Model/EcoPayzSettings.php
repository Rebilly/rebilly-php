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

class EcoPayzSettings implements JsonSerializable
{
    public const VALID_CURRENCY_CAD = 'CAD';

    public const VALID_CURRENCY_EUR = 'EUR';

    public const VALID_CURRENCY_GBP = 'GBP';

    public const VALID_CURRENCY_USD = 'USD';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('validCurrency', $data)) {
            $this->setValidCurrency($data['validCurrency']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
