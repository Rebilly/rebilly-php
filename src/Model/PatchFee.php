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

class PatchFee implements JsonSerializable
{
    public const TYPE_BUY = 'buy';

    public const TYPE_SELL = 'sell';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('formula', $data)) {
            $this->setFormula($data['formula']);
        }
        if (array_key_exists('settlementSettings', $data)) {
            $this->setSettlementSettings($data['settlementSettings']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getFormula(): ?FeeFormula
    {
        return $this->fields['formula'] ?? null;
    }

    public function setFormula(null|FeeFormula|array $formula): static
    {
        if ($formula !== null && !($formula instanceof FeeFormula)) {
            $formula = FeeFormulaFactory::from($formula);
        }

        $this->fields['formula'] = $formula;

        return $this;
    }

    public function getSettlementSettings(): ?SettlementSettings
    {
        return $this->fields['settlementSettings'] ?? null;
    }

    public function setSettlementSettings(null|SettlementSettings|array $settlementSettings): static
    {
        if ($settlementSettings !== null && !($settlementSettings instanceof SettlementSettings)) {
            $settlementSettings = SettlementSettings::from($settlementSettings);
        }

        $this->fields['settlementSettings'] = $settlementSettings;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('formula', $this->fields)) {
            $data['formula'] = $this->fields['formula']?->jsonSerialize();
        }
        if (array_key_exists('settlementSettings', $this->fields)) {
            $data['settlementSettings'] = $this->fields['settlementSettings']?->jsonSerialize();
        }

        return $data;
    }
}
