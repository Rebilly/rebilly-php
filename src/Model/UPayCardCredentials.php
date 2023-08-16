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

class UPayCardCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('receiver_account', $data)) {
            $this->setReceiverAccount($data['receiver_account']);
        }
        if (array_key_exists('key', $data)) {
            $this->setKey($data['key']);
        }
        if (array_key_exists('secret', $data)) {
            $this->setSecret($data['secret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getReceiverAccount(): string
    {
        return $this->fields['receiver_account'];
    }

    public function setReceiverAccount(string $receiverAccount): static
    {
        $this->fields['receiver_account'] = $receiverAccount;

        return $this;
    }

    public function getKey(): string
    {
        return $this->fields['key'];
    }

    public function setKey(string $key): static
    {
        $this->fields['key'] = $key;

        return $this;
    }

    public function getSecret(): string
    {
        return $this->fields['secret'];
    }

    public function setSecret(string $secret): static
    {
        $this->fields['secret'] = $secret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('receiver_account', $this->fields)) {
            $data['receiver_account'] = $this->fields['receiver_account'];
        }
        if (array_key_exists('key', $this->fields)) {
            $data['key'] = $this->fields['key'];
        }
        if (array_key_exists('secret', $this->fields)) {
            $data['secret'] = $this->fields['secret'];
        }

        return $data;
    }
}
