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

class GetPayoutRequestBatchPreviewResponse implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('matchingCount', $data)) {
            $this->setMatchingCount($data['matchingCount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('matchingCount', $this->fields)) {
            $data['matchingCount'] = $this->fields['matchingCount'];
        }

        return $data;
    }
}
