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

class CommonPlanTrial implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }
        if (array_key_exists('period', $data)) {
            $this->setPeriod($data['period']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPrice(): float
    {
        return $this->fields['price'];
    }

    public function setPrice(float|string $price): self
    {
        if (is_string($price)) {
            $price = (float) $price;
        }

        $this->fields['price'] = $price;

        return $this;
    }

    public function getPeriod(): PlanPeriod
    {
        return $this->fields['period'];
    }

    public function setPeriod(PlanPeriod|array $period): self
    {
        if (!($period instanceof \Rebilly\Sdk\Model\PlanPeriod)) {
            $period = \Rebilly\Sdk\Model\PlanPeriod::from($period);
        }

        $this->fields['period'] = $period;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('price', $this->fields)) {
            $data['price'] = $this->fields['price'];
        }
        if (array_key_exists('period', $this->fields)) {
            $data['period'] = $this->fields['period']?->jsonSerialize();
        }

        return $data;
    }
}
