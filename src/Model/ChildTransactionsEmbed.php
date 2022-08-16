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

class ChildTransactionsEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('childTransactions', $data)) {
            $this->setChildTransactions($data['childTransactions']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|Transaction[]
     */
    public function getChildTransactions(): ?array
    {
        return $this->fields['childTransactions'] ?? null;
    }

    /**
     * @param null|Transaction[] $childTransactions
     */
    public function setChildTransactions(null|array $childTransactions): self
    {
        $childTransactions = $childTransactions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Transaction ? $value : Transaction::from($value)) : null, $childTransactions) : null;

        $this->fields['childTransactions'] = $childTransactions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('childTransactions', $this->fields)) {
            $data['childTransactions'] = $this->fields['childTransactions'];
        }

        return $data;
    }
}
