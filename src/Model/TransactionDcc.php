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

class TransactionDcc implements JsonSerializable
{
    use HasMetadata;

    public const OUTCOME_UNPROCESSED = 'unprocessed';

    public const OUTCOME_REJECTED = 'rejected';

    public const OUTCOME_SELECTED = 'selected';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('base', $data)) {
            $this->setBase($data['base']);
        }
        if (array_key_exists('quote', $data)) {
            $this->setQuote($data['quote']);
        }
        if (array_key_exists('usdMarkup', $data)) {
            $this->setUsdMarkup($data['usdMarkup']);
        }
        if (array_key_exists('outcome', $data)) {
            $this->setOutcome($data['outcome']);
        }
        if (array_key_exists('isForceDcc', $data)) {
            $this->setIsForceDcc($data['isForceDcc']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getBase(): ?Money
    {
        return $this->fields['base'] ?? null;
    }

    public function setBase(null|Money|array $base): static
    {
        if ($base !== null && !($base instanceof Money)) {
            $base = Money::from($base);
        }

        $this->fields['base'] = $base;

        return $this;
    }

    public function getQuote(): ?Money
    {
        return $this->fields['quote'] ?? null;
    }

    public function setQuote(null|Money|array $quote): static
    {
        if ($quote !== null && !($quote instanceof Money)) {
            $quote = Money::from($quote);
        }

        $this->fields['quote'] = $quote;

        return $this;
    }

    public function getUsdMarkup(): ?float
    {
        return $this->fields['usdMarkup'] ?? null;
    }

    public function setUsdMarkup(null|float|string $usdMarkup): static
    {
        if (is_string($usdMarkup)) {
            $usdMarkup = (float) $usdMarkup;
        }

        $this->fields['usdMarkup'] = $usdMarkup;

        return $this;
    }

    public function getOutcome(): ?string
    {
        return $this->fields['outcome'] ?? null;
    }

    public function setOutcome(null|string $outcome): static
    {
        $this->fields['outcome'] = $outcome;

        return $this;
    }

    public function getIsForceDcc(): ?bool
    {
        return $this->fields['isForceDcc'] ?? null;
    }

    public function setIsForceDcc(null|bool $isForceDcc): static
    {
        $this->fields['isForceDcc'] = $isForceDcc;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('base', $this->fields)) {
            $data['base'] = $this->fields['base']?->jsonSerialize();
        }
        if (array_key_exists('quote', $this->fields)) {
            $data['quote'] = $this->fields['quote']?->jsonSerialize();
        }
        if (array_key_exists('usdMarkup', $this->fields)) {
            $data['usdMarkup'] = $this->fields['usdMarkup'];
        }
        if (array_key_exists('outcome', $this->fields)) {
            $data['outcome'] = $this->fields['outcome'];
        }
        if (array_key_exists('isForceDcc', $this->fields)) {
            $data['isForceDcc'] = $this->fields['isForceDcc'];
        }

        return $data;
    }
}
