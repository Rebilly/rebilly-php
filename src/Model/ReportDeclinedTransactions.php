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
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
            fn ($value) => $value instanceof ReportDeclinedTransactionsData ? $value : ReportDeclinedTransactionsData::from($value),
            $data,
        ) : null;

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'] !== null
                ? array_map(
                    static fn (ReportDeclinedTransactionsData $reportDeclinedTransactionsData) => $reportDeclinedTransactionsData->jsonSerialize(),
                    $this->fields['data'],
                )
                : null;
        }

        return $data;
    }
}
