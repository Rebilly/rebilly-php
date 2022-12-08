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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class CashierStrategy implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('amounts', $data)) {
            $this->setAmounts($data['amounts']);
        }
        if (array_key_exists('customAmount', $data)) {
            $this->setCustomAmount($data['customAmount']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getFilter(): string
    {
        return $this->fields['filter'];
    }

    public function setFilter(string $filter): self
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    public function getAmounts(): CashierStrategyAmounts
    {
        return $this->fields['amounts'];
    }

    public function setAmounts(CashierStrategyAmounts|array $amounts): self
    {
        if (!($amounts instanceof CashierStrategyAmounts)) {
            $amounts = CashierStrategyAmounts::from($amounts);
        }

        $this->fields['amounts'] = $amounts;

        return $this;
    }

    public function getCustomAmount(): CashierStrategyCustomAmount
    {
        return $this->fields['customAmount'];
    }

    public function setCustomAmount(CashierStrategyCustomAmount|array $customAmount): self
    {
        if (!($customAmount instanceof CashierStrategyCustomAmount)) {
            $customAmount = CashierStrategyCustomAmount::from($customAmount);
        }

        $this->fields['customAmount'] = $customAmount;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('amounts', $this->fields)) {
            $data['amounts'] = $this->fields['amounts']?->jsonSerialize();
        }
        if (array_key_exists('customAmount', $this->fields)) {
            $data['customAmount'] = $this->fields['customAmount']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
