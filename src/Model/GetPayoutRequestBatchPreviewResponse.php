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
use Rebilly\Sdk\Trait\HasMetadata;

class GetPayoutRequestBatchPreviewResponse implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('matchingCount', $data)) {
            $this->setMatchingCount($data['matchingCount']);
        }
        if (array_key_exists('customerCount', $data)) {
            $this->setCustomerCount($data['customerCount']);
        }
        if (array_key_exists('totalAmountByCurrency', $data)) {
            $this->setTotalAmountByCurrency($data['totalAmountByCurrency']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMatchingCount(): ?int
    {
        return $this->fields['matchingCount'] ?? null;
    }

    public function setMatchingCount(null|int $matchingCount): static
    {
        $this->fields['matchingCount'] = $matchingCount;

        return $this;
    }

    public function getCustomerCount(): ?int
    {
        return $this->fields['customerCount'] ?? null;
    }

    public function setCustomerCount(null|int $customerCount): static
    {
        $this->fields['customerCount'] = $customerCount;

        return $this;
    }

    /**
     * @return null|GetPayoutRequestBatchPreviewResponseTotalAmountByCurrency[]
     */
    public function getTotalAmountByCurrency(): ?array
    {
        return $this->fields['totalAmountByCurrency'] ?? null;
    }

    /**
     * @param null|array[]|GetPayoutRequestBatchPreviewResponseTotalAmountByCurrency[] $totalAmountByCurrency
     */
    public function setTotalAmountByCurrency(null|array $totalAmountByCurrency): static
    {
        $totalAmountByCurrency = $totalAmountByCurrency !== null ? array_map(
            fn ($value) => $value instanceof GetPayoutRequestBatchPreviewResponseTotalAmountByCurrency ? $value : GetPayoutRequestBatchPreviewResponseTotalAmountByCurrency::from($value),
            $totalAmountByCurrency,
        ) : null;

        $this->fields['totalAmountByCurrency'] = $totalAmountByCurrency;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('matchingCount', $this->fields)) {
            $data['matchingCount'] = $this->fields['matchingCount'];
        }
        if (array_key_exists('customerCount', $this->fields)) {
            $data['customerCount'] = $this->fields['customerCount'];
        }
        if (array_key_exists('totalAmountByCurrency', $this->fields)) {
            $data['totalAmountByCurrency'] = $this->fields['totalAmountByCurrency'] !== null
                ? array_map(
                    static fn (GetPayoutRequestBatchPreviewResponseTotalAmountByCurrency $getPayoutRequestBatchPreviewResponseTotalAmountByCurrency) => $getPayoutRequestBatchPreviewResponseTotalAmountByCurrency->jsonSerialize(),
                    $this->fields['totalAmountByCurrency'],
                )
                : null;
        }

        return $data;
    }
}
