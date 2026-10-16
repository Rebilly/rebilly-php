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

interface AddPayoutRequestBatchOperation extends PayoutRequestBatchOperationRequest
{
    public function getBatchId(): ?string;

    public function setBatchId(null|string $batchId): static;

    /**
     * @return null|string[]
     */
    public function getPayoutRequestIds(): ?array;

    /**
     * @param string[] $payoutRequestIds
     */
    public function setPayoutRequestIds(array $payoutRequestIds): static;

    public function getFilter(): ?string;

    public function setFilter(string $filter): static;
}
