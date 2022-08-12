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

class ParentTransactionEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('parentTransaction', $data)) {
            $this->setParentTransaction($data['parentTransaction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getParentTransaction(): ?Transaction
    {
        return $this->fields['parentTransaction'] ?? null;
    }

    public function setParentTransaction(null|Transaction|array $parentTransaction): self
    {
        if ($parentTransaction !== null && !($parentTransaction instanceof \Rebilly\Sdk\Model\Transaction)) {
            $parentTransaction = \Rebilly\Sdk\Model\Transaction::from($parentTransaction);
        }

        $this->fields['parentTransaction'] = $parentTransaction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('parentTransaction', $this->fields)) {
            $data['parentTransaction'] = $this->fields['parentTransaction']?->jsonSerialize();
        }

        return $data;
    }
}
