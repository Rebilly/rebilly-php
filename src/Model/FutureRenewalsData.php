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

class FutureRenewalsData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('sum', $data)) {
            $this->setSum($data['sum']);
        }
        if (array_key_exists('plansCount', $data)) {
            $this->setPlansCount($data['plansCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDate(): ?string
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|string $date): static
    {
        $this->fields['date'] = $date;

        return $this;
    }

    public function getSum(): ?float
    {
        return $this->fields['sum'] ?? null;
    }

    public function setSum(null|float|string $sum): static
    {
        if (is_string($sum)) {
            $sum = (float) $sum;
        }

        $this->fields['sum'] = $sum;

        return $this;
    }

    /**
     * @return null|FutureRenewalsDataPlansCount[]
     */
    public function getPlansCount(): ?array
    {
        return $this->fields['plansCount'] ?? null;
    }

    /**
     * @param null|array[]|FutureRenewalsDataPlansCount[] $plansCount
     */
    public function setPlansCount(null|array $plansCount): static
    {
        $plansCount = $plansCount !== null ? array_map(
            fn ($value) => $value instanceof FutureRenewalsDataPlansCount ? $value : FutureRenewalsDataPlansCount::from($value),
            $plansCount,
        ) : null;

        $this->fields['plansCount'] = $plansCount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date'];
        }
        if (array_key_exists('sum', $this->fields)) {
            $data['sum'] = $this->fields['sum'];
        }
        if (array_key_exists('plansCount', $this->fields)) {
            $data['plansCount'] = $this->fields['plansCount'] !== null
                ? array_map(
                    static fn (FutureRenewalsDataPlansCount $futureRenewalsDataPlansCount) => $futureRenewalsDataPlansCount->jsonSerialize(),
                    $this->fields['plansCount'],
                )
                : null;
        }

        return $data;
    }
}
