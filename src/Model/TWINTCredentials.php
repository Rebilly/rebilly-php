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

class TWINTCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('storeUuid', $data)) {
            $this->setStoreUuid($data['storeUuid']);
        }
        if (array_key_exists('cashRegisterId', $data)) {
            $this->setCashRegisterId($data['cashRegisterId']);
        }
        if (array_key_exists('publicKey', $data)) {
            $this->setPublicKey($data['publicKey']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        if (array_key_exists('keyPassphrase', $data)) {
            $this->setKeyPassphrase($data['keyPassphrase']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStoreUuid(): string
    {
        return $this->fields['storeUuid'];
    }

    public function setStoreUuid(string $storeUuid): self
    {
        $this->fields['storeUuid'] = $storeUuid;

        return $this;
    }

    public function getCashRegisterId(): string
    {
        return $this->fields['cashRegisterId'];
    }

    public function setCashRegisterId(string $cashRegisterId): self
    {
        $this->fields['cashRegisterId'] = $cashRegisterId;

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->fields['publicKey'];
    }

    public function setPublicKey(string $publicKey): self
    {
        $this->fields['publicKey'] = $publicKey;

        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->fields['privateKey'];
    }

    public function setPrivateKey(string $privateKey): self
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function getKeyPassphrase(): string
    {
        return $this->fields['keyPassphrase'];
    }

    public function setKeyPassphrase(string $keyPassphrase): self
    {
        $this->fields['keyPassphrase'] = $keyPassphrase;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('storeUuid', $this->fields)) {
            $data['storeUuid'] = $this->fields['storeUuid'];
        }
        if (array_key_exists('cashRegisterId', $this->fields)) {
            $data['cashRegisterId'] = $this->fields['cashRegisterId'];
        }
        if (array_key_exists('publicKey', $this->fields)) {
            $data['publicKey'] = $this->fields['publicKey'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }
        if (array_key_exists('keyPassphrase', $this->fields)) {
            $data['keyPassphrase'] = $this->fields['keyPassphrase'];
        }

        return $data;
    }
}
