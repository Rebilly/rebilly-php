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

class BankAccountEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('bankAccount', $data)) {
            $this->setBankAccount($data['bankAccount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getBankAccount(): ?BankAccount
    {
        return $this->fields['bankAccount'] ?? null;
    }

    public function setBankAccount(null|BankAccount|array $bankAccount): self
    {
        if ($bankAccount !== null && !($bankAccount instanceof BankAccount)) {
            $bankAccount = BankAccount::from($bankAccount);
        }

        $this->fields['bankAccount'] = $bankAccount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('bankAccount', $this->fields)) {
            $data['bankAccount'] = $this->fields['bankAccount']?->jsonSerialize();
        }

        return $data;
    }
}
