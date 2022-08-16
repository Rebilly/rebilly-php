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

class AuthTransactionEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('authTransaction', $data)) {
            $this->setAuthTransaction($data['authTransaction']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAuthTransaction(): ?Transaction
    {
        return $this->fields['authTransaction'] ?? null;
    }

    public function setAuthTransaction(null|Transaction|array $authTransaction): self
    {
        if ($authTransaction !== null && !($authTransaction instanceof Transaction)) {
            $authTransaction = Transaction::from($authTransaction);
        }

        $this->fields['authTransaction'] = $authTransaction;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authTransaction', $this->fields)) {
            $data['authTransaction'] = $this->fields['authTransaction']?->jsonSerialize();
        }

        return $data;
    }
}
