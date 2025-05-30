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

class ChargeTransaction implements BalanceTransaction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('parentId', $data)) {
            $this->setParentId($data['parentId']);
        }
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('settlementCurrency', $data)) {
            $this->setSettlementCurrency($data['settlementCurrency']);
        }
        if (array_key_exists('settlementAmount', $data)) {
            $this->setSettlementAmount($data['settlementAmount']);
        }
        if (array_key_exists('settlementTime', $data)) {
            $this->setSettlementTime($data['settlementTime']);
        }
        if (array_key_exists('settlementRate', $data)) {
            $this->setSettlementRate($data['settlementRate']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'charge';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getParentId(): ?string
    {
        return $this->fields['parentId'] ?? null;
    }

    public function setParentId(null|string $parentId): static
    {
        $this->fields['parentId'] = $parentId;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function setTransactionId(null|string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    public function getSettlementCurrency(): ?string
    {
        return $this->fields['settlementCurrency'] ?? null;
    }

    public function setSettlementCurrency(null|string $settlementCurrency): static
    {
        $this->fields['settlementCurrency'] = $settlementCurrency;

        return $this;
    }

    public function getSettlementAmount(): ?float
    {
        return $this->fields['settlementAmount'] ?? null;
    }

    public function setSettlementAmount(null|float|string $settlementAmount): static
    {
        if (is_string($settlementAmount)) {
            $settlementAmount = (float) $settlementAmount;
        }

        $this->fields['settlementAmount'] = $settlementAmount;

        return $this;
    }

    public function getSettlementTime(): ?DateTimeImmutable
    {
        return $this->fields['settlementTime'] ?? null;
    }

    public function getSettlementRate(): ?float
    {
        return $this->fields['settlementRate'] ?? null;
    }

    public function setSettlementRate(null|float|string $settlementRate): static
    {
        if (is_string($settlementRate)) {
            $settlementRate = (float) $settlementRate;
        }

        $this->fields['settlementRate'] = $settlementRate;

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

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'charge',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('parentId', $this->fields)) {
            $data['parentId'] = $this->fields['parentId'];
        }
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('settlementCurrency', $this->fields)) {
            $data['settlementCurrency'] = $this->fields['settlementCurrency'];
        }
        if (array_key_exists('settlementAmount', $this->fields)) {
            $data['settlementAmount'] = $this->fields['settlementAmount'];
        }
        if (array_key_exists('settlementTime', $this->fields)) {
            $data['settlementTime'] = $this->fields['settlementTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('settlementRate', $this->fields)) {
            $data['settlementRate'] = $this->fields['settlementRate'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setSettlementTime(null|DateTimeImmutable|string $settlementTime): static
    {
        if ($settlementTime !== null && !($settlementTime instanceof DateTimeImmutable)) {
            $settlementTime = new DateTimeImmutable($settlementTime);
        }

        $this->fields['settlementTime'] = $settlementTime;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
