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

class TransactionDcc implements JsonSerializable
{
    public const OUTCOME_REJECTED = 'rejected';

    public const OUTCOME_SELECTED = 'selected';

    public const OUTCOME_UNKNOWN = 'unknown';

    private array $fields = [];

    public function __construct(array $data = [])
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getBase(): ?Money
    {
        return $this->fields['base'] ?? null;
    }

    public function setBase(null|Money|array $base): self
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

    public function setQuote(null|Money|array $quote): self
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

    public function setUsdMarkup(null|float $usdMarkup): self
    {
        $this->fields['usdMarkup'] = $usdMarkup;

        return $this;
    }

    /**
     * @psalm-return self::OUTCOME_*|null $outcome
     */
    public function getOutcome(): ?string
    {
        return $this->fields['outcome'] ?? null;
    }

    /**
     * @psalm-param self::OUTCOME_*|null $outcome
     */
    public function setOutcome(null|string $outcome): self
    {
        $this->fields['outcome'] = $outcome;

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

        return $data;
    }
}
