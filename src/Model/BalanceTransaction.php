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
use InvalidArgumentException;
use JsonSerializable;

abstract class BalanceTransaction implements JsonSerializable
{
    public const TYPE_CHARGE = 'charge';

    public const TYPE_REFUND = 'refund';

    public const TYPE_BUY_FEE = 'buy-fee';

    public const TYPE_SELL_FEE = 'sell-fee';

    public const TYPE_RISK_RESERVE = 'risk-reserve';

    public const TYPE_RISK_RESERVE_RELEASE = 'risk-reserve-release';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
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
    }

    public static function from(array $data = []): self
    {
        switch ($data['type']) {
            case 'buy-fee':
                return new BuyFeeTransaction($data);
            case 'charge':
                return new ChargeTransaction($data);
            case 'refund':
                return new RefundTransaction($data);
            case 'risk-reserve':
                return new RiskReserveTransaction($data);
            case 'risk-reserve-release':
                return new RiskReserveReleaseTransaction($data);
            case 'sell-fee':
                return new SellFeeTransaction($data);
        }

        throw new InvalidArgumentException("Unsupported type value: '{$data['type']}'");
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getParentId(): ?string
    {
        return $this->fields['parentId'] ?? null;
    }

    public function setParentId(null|string $parentId): self
    {
        $this->fields['parentId'] = $parentId;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function setTransactionId(null|string $transactionId): self
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    public function getSettlementCurrency(): ?string
    {
        return $this->fields['settlementCurrency'] ?? null;
    }

    public function setSettlementCurrency(null|string $settlementCurrency): self
    {
        $this->fields['settlementCurrency'] = $settlementCurrency;

        return $this;
    }

    public function getSettlementAmount(): ?float
    {
        return $this->fields['settlementAmount'] ?? null;
    }

    public function setSettlementAmount(null|float|string $settlementAmount): self
    {
        if ($settlementAmount !== null && is_string($settlementAmount)) {
            $settlementAmount = (float) $settlementAmount;
        }

        $this->fields['settlementAmount'] = $settlementAmount;

        return $this;
    }

    public function getSettlementTime(): ?DateTimeImmutable
    {
        return $this->fields['settlementTime'] ?? null;
    }

    public function setSettlementTime(null|DateTimeImmutable|string $settlementTime): self
    {
        if ($settlementTime !== null && !($settlementTime instanceof DateTimeImmutable)) {
            $settlementTime = new DateTimeImmutable($settlementTime);
        }

        $this->fields['settlementTime'] = $settlementTime;

        return $this;
    }

    public function getSettlementRate(): ?float
    {
        return $this->fields['settlementRate'] ?? null;
    }

    public function setSettlementRate(null|float|string $settlementRate): self
    {
        if ($settlementRate !== null && is_string($settlementRate)) {
            $settlementRate = (float) $settlementRate;
        }

        $this->fields['settlementRate'] = $settlementRate;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
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
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
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

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

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
