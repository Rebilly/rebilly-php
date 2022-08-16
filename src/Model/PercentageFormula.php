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

class PercentageFormula extends FeeFormula
{
    public const TYPE_PERCENTAGE = 'percentage';

    public const ROUND_REGULAR = 'regular';

    public const ROUND_UP = 'up';

    public const ROUND_DOWN = 'down';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'type' => 'percentage',
        ] + $data);

        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('bips', $data)) {
            $this->setBips($data['bips']);
        }
        if (array_key_exists('round', $data)) {
            $this->setRound($data['round']);
        }
        if (array_key_exists('minAmount', $data)) {
            $this->setMinAmount($data['minAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getBips(): float
    {
        return $this->fields['bips'];
    }

    public function setBips(float $bips): self
    {
        $this->fields['bips'] = $bips;

        return $this;
    }

    /**
     * @psalm-return self::ROUND_*|null $round
     */
    public function getRound(): ?string
    {
        return $this->fields['round'] ?? null;
    }

    /**
     * @psalm-param self::ROUND_*|null $round
     */
    public function setRound(null|string $round): self
    {
        $this->fields['round'] = $round;

        return $this;
    }

    public function getMinAmount(): ?float
    {
        return $this->fields['minAmount'] ?? null;
    }

    public function setMinAmount(null|float|string $minAmount): self
    {
        if (is_string($minAmount)) {
            $minAmount = (float) $minAmount;
        }

        $this->fields['minAmount'] = $minAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('bips', $this->fields)) {
            $data['bips'] = $this->fields['bips'];
        }
        if (array_key_exists('round', $this->fields)) {
            $data['round'] = $this->fields['round'];
        }
        if (array_key_exists('minAmount', $this->fields)) {
            $data['minAmount'] = $this->fields['minAmount'];
        }

        return parent::jsonSerialize() + $data;
    }
}
