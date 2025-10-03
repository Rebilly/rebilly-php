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

class ReportAnnualRecurringRevenueDataBreakdown implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('change', $data)) {
            $this->setChange($data['change']);
        }
        if (array_key_exists('new', $data)) {
            $this->setNew($data['new']);
        }
        if (array_key_exists('reactivation', $data)) {
            $this->setReactivation($data['reactivation']);
        }
        if (array_key_exists('churned', $data)) {
            $this->setChurned($data['churned']);
        }
        if (array_key_exists('contraction', $data)) {
            $this->setContraction($data['contraction']);
        }
        if (array_key_exists('expansion', $data)) {
            $this->setExpansion($data['expansion']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getChange(): ?float
    {
        return $this->fields['change'] ?? null;
    }

    public function setChange(null|float|string $change): static
    {
        if (is_string($change)) {
            $change = (float) $change;
        }

        $this->fields['change'] = $change;

        return $this;
    }

    public function getNew(): ?float
    {
        return $this->fields['new'] ?? null;
    }

    public function setNew(null|float|string $new): static
    {
        if (is_string($new)) {
            $new = (float) $new;
        }

        $this->fields['new'] = $new;

        return $this;
    }

    public function getReactivation(): ?float
    {
        return $this->fields['reactivation'] ?? null;
    }

    public function setReactivation(null|float|string $reactivation): static
    {
        if (is_string($reactivation)) {
            $reactivation = (float) $reactivation;
        }

        $this->fields['reactivation'] = $reactivation;

        return $this;
    }

    public function getChurned(): ?float
    {
        return $this->fields['churned'] ?? null;
    }

    public function setChurned(null|float|string $churned): static
    {
        if (is_string($churned)) {
            $churned = (float) $churned;
        }

        $this->fields['churned'] = $churned;

        return $this;
    }

    public function getContraction(): ?float
    {
        return $this->fields['contraction'] ?? null;
    }

    public function setContraction(null|float|string $contraction): static
    {
        if (is_string($contraction)) {
            $contraction = (float) $contraction;
        }

        $this->fields['contraction'] = $contraction;

        return $this;
    }

    public function getExpansion(): ?float
    {
        return $this->fields['expansion'] ?? null;
    }

    public function setExpansion(null|float|string $expansion): static
    {
        if (is_string($expansion)) {
            $expansion = (float) $expansion;
        }

        $this->fields['expansion'] = $expansion;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('change', $this->fields)) {
            $data['change'] = $this->fields['change'];
        }
        if (array_key_exists('new', $this->fields)) {
            $data['new'] = $this->fields['new'];
        }
        if (array_key_exists('reactivation', $this->fields)) {
            $data['reactivation'] = $this->fields['reactivation'];
        }
        if (array_key_exists('churned', $this->fields)) {
            $data['churned'] = $this->fields['churned'];
        }
        if (array_key_exists('contraction', $this->fields)) {
            $data['contraction'] = $this->fields['contraction'];
        }
        if (array_key_exists('expansion', $this->fields)) {
            $data['expansion'] = $this->fields['expansion'];
        }

        return $data;
    }
}
