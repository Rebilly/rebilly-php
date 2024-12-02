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

class OchaPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiUsername', $data)) {
            $this->setApiUsername($data['apiUsername']);
        }
        if (array_key_exists('apiPassword', $data)) {
            $this->setApiPassword($data['apiPassword']);
        }
        if (array_key_exists('secretWord', $data)) {
            $this->setSecretWord($data['secretWord']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiUsername(): string
    {
        return $this->fields['apiUsername'];
    }

    public function setApiUsername(string $apiUsername): static
    {
        $this->fields['apiUsername'] = $apiUsername;

        return $this;
    }

    public function getApiPassword(): string
    {
        return $this->fields['apiPassword'];
    }

    public function setApiPassword(string $apiPassword): static
    {
        $this->fields['apiPassword'] = $apiPassword;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiUsername', $this->fields)) {
            $data['apiUsername'] = $this->fields['apiUsername'];
        }
        if (array_key_exists('apiPassword', $this->fields)) {
            $data['apiPassword'] = $this->fields['apiPassword'];
        }
        if (array_key_exists('secretWord', $this->fields)) {
            $data['secretWord'] = $this->fields['secretWord'];
        }

        return $data;
    }
}
