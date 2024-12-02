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

class SkrillCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('accountEmail', $data)) {
            $this->setAccountEmail($data['accountEmail']);
        }
        if (array_key_exists('secretWord', $data)) {
            $this->setSecretWord($data['secretWord']);
        }
        if (array_key_exists('mqiPassword', $data)) {
            $this->setMqiPassword($data['mqiPassword']);
        }
        if (array_key_exists('currencyAccountIds', $data)) {
            $this->setCurrencyAccountIds($data['currencyAccountIds']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAccountEmail(): string
    {
        return $this->fields['accountEmail'];
    }

    public function setAccountEmail(string $accountEmail): static
    {
        $this->fields['accountEmail'] = $accountEmail;

        return $this;
    }

    public function getSecretWord(): string
    {
        return $this->fields['secretWord'];
    }

    public function setSecretWord(string $secretWord): static
    {
        $this->fields['secretWord'] = $secretWord;

        return $this;
    }

    public function getMqiPassword(): ?string
    {
        return $this->fields['mqiPassword'] ?? null;
    }

    public function setMqiPassword(null|string $mqiPassword): static
    {
        $this->fields['mqiPassword'] = $mqiPassword;

        return $this;
    }

    public function getCurrencyAccountIds(): ?string
    {
        return $this->fields['currencyAccountIds'] ?? null;
    }

    public function setCurrencyAccountIds(null|string $currencyAccountIds): static
    {
        $this->fields['currencyAccountIds'] = $currencyAccountIds;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountEmail', $this->fields)) {
            $data['accountEmail'] = $this->fields['accountEmail'];
        }
        if (array_key_exists('secretWord', $this->fields)) {
            $data['secretWord'] = $this->fields['secretWord'];
        }
        if (array_key_exists('mqiPassword', $this->fields)) {
            $data['mqiPassword'] = $this->fields['mqiPassword'];
        }
        if (array_key_exists('currencyAccountIds', $this->fields)) {
            $data['currencyAccountIds'] = $this->fields['currencyAccountIds'];
        }

        return $data;
    }
}
