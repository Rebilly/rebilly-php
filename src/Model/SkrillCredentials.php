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

class SkrillCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
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
        if (array_key_exists('merchantId', $data)) {
            $this->setMerchantId($data['merchantId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getMerchantId(): ?string
    {
        return $this->fields['merchantId'] ?? null;
    }

    public function setMerchantId(null|string $merchantId): static
    {
        $this->fields['merchantId'] = $merchantId;

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
        if (array_key_exists('merchantId', $this->fields)) {
            $data['merchantId'] = $this->fields['merchantId'];
        }

        return $data;
    }
}
