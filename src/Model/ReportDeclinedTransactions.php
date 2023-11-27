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

class ReportDeclinedTransactions implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('totalCount', $data)) {
            $this->setTotalCount($data['totalCount']);
        }
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTotalCount(): ?int
    {
        return $this->fields['totalCount'] ?? null;
    }

    public function setTotalCount(null|int $totalCount): static
    {
        $this->fields['totalCount'] = $totalCount;

        return $this;
    }

    /**
     * @return null|ReportDeclinedTransactionsData[]
     */
    public function getData(): ?array
    {
        return $this->fields['data'] ?? null;
    }

    /**
     * @param null|array[]|ReportDeclinedTransactionsData[] $data
     */
    public function setData(null|array $data): static
    {
        $data = $data !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof ReportDeclinedTransactionsData ? $value : ReportDeclinedTransactionsData::from($value)) : null,
            $data,
        ) : null;

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('totalCount', $this->fields)) {
            $data['totalCount'] = $this->fields['totalCount'];
        }
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'];
        }

        return $data;
    }
}
