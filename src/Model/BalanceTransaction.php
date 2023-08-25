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

interface BalanceTransaction
{
    public function getId(): ?string;

    public function getType(): string;

    public function getTransactionId(): ?string;

    public function setTransactionId(null|string $transactionId): static;

    public function getSettlementCurrency(): ?string;

    public function setSettlementCurrency(null|string $settlementCurrency): static;

    public function getSettlementAmount(): ?float;

    public function setSettlementAmount(null|float|string $settlementAmount): static;

    public function getSettlementTime(): ?DateTimeImmutable;

    public function getSettlementRate(): ?float;

    public function setSettlementRate(null|float|string $settlementRate): static;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static;
}
