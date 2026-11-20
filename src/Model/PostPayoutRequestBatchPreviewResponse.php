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

class PostPayoutRequestBatchPreviewResponse implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('matchingCount', $data)) {
            $this->setMatchingCount($data['matchingCount']);
        }
        if (array_key_exists('selectedCount', $data)) {
            $this->setSelectedCount($data['selectedCount']);
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

    public function getMatchingCount(): int
    {
        return $this->fields['matchingCount'];
    }

    public function setMatchingCount(int $matchingCount): static
    {
        $this->fields['matchingCount'] = $matchingCount;

        return $this;
    }

    public function getSelectedCount(): int
    {
        return $this->fields['selectedCount'];
    }

    public function setSelectedCount(int $selectedCount): static
    {
        $this->fields['selectedCount'] = $selectedCount;

        return $this;
    }

    public function getCustomerCount(): int
    {
        return $this->fields['customerCount'];
    }

    public function setCustomerCount(int $customerCount): static
    {
        $this->fields['customerCount'] = $customerCount;

        return $this;
    }

    /**
     * @return PostPayoutRequestBatchPreviewResponseTotalAmountByCurrency[]
     */
    public function getTotalAmountByCurrency(): array
    {
        return $this->fields['totalAmountByCurrency'];
    }

    /**
     * @param array[]|PostPayoutRequestBatchPreviewResponseTotalAmountByCurrency[] $totalAmountByCurrency
     */
    public function setTotalAmountByCurrency(array $totalAmountByCurrency): static
    {
        $totalAmountByCurrency = array_map(
            fn ($value) => $value instanceof PostPayoutRequestBatchPreviewResponseTotalAmountByCurrency ? $value : PostPayoutRequestBatchPreviewResponseTotalAmountByCurrency::from($value),
            $totalAmountByCurrency,
        );

        $this->fields['totalAmountByCurrency'] = $totalAmountByCurrency;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('matchingCount', $this->fields)) {
            $data['matchingCount'] = $this->fields['matchingCount'];
        }
        if (array_key_exists('selectedCount', $this->fields)) {
            $data['selectedCount'] = $this->fields['selectedCount'];
        }
        if (array_key_exists('customerCount', $this->fields)) {
            $data['customerCount'] = $this->fields['customerCount'];
        }
        if (array_key_exists('totalAmountByCurrency', $this->fields)) {
            $data['totalAmountByCurrency'] = array_map(
                static fn (PostPayoutRequestBatchPreviewResponseTotalAmountByCurrency $postPayoutRequestBatchPreviewResponseTotalAmountByCurrency) => $postPayoutRequestBatchPreviewResponseTotalAmountByCurrency->jsonSerialize(),
                $this->fields['totalAmountByCurrency'],
            );
        }

        return $data;
    }
}
