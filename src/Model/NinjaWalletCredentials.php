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

class NinjaWalletCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('secret', $data)) {
            $this->setSecret($data['secret']);
        }
        if (array_key_exists('passphrase', $data)) {
            $this->setPassphrase($data['passphrase']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): self
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getSecret(): string
    {
        return $this->fields['secret'];
    }

    public function setSecret(string $secret): self
    {
        $this->fields['secret'] = $secret;

        return $this;
    }

    public function getPassphrase(): string
    {
        return $this->fields['passphrase'];
    }

    public function setPassphrase(string $passphrase): self
    {
        $this->fields['passphrase'] = $passphrase;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('secret', $this->fields)) {
            $data['secret'] = $this->fields['secret'];
        }
        if (array_key_exists('passphrase', $this->fields)) {
            $data['passphrase'] = $this->fields['passphrase'];
        }

        return $data;
    }
}
