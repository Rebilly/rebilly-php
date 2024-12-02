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

class AircashCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('partnerId', $data)) {
            $this->setPartnerId($data['partnerId']);
        }
        if (array_key_exists('privateKey', $data)) {
            $this->setPrivateKey($data['privateKey']);
        }
        if (array_key_exists('privateKeyPassword', $data)) {
            $this->setPrivateKeyPassword($data['privateKeyPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPartnerId(): string
    {
        return $this->fields['partnerId'];
    }

    public function setPartnerId(string $partnerId): static
    {
        $this->fields['partnerId'] = $partnerId;

        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->fields['privateKey'];
    }

    public function setPrivateKey(string $privateKey): static
    {
        $this->fields['privateKey'] = $privateKey;

        return $this;
    }

    public function getPrivateKeyPassword(): string
    {
        return $this->fields['privateKeyPassword'];
    }

    public function setPrivateKeyPassword(string $privateKeyPassword): static
    {
        $this->fields['privateKeyPassword'] = $privateKeyPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('partnerId', $this->fields)) {
            $data['partnerId'] = $this->fields['partnerId'];
        }
        if (array_key_exists('privateKey', $this->fields)) {
            $data['privateKey'] = $this->fields['privateKey'];
        }
        if (array_key_exists('privateKeyPassword', $this->fields)) {
            $data['privateKeyPassword'] = $this->fields['privateKeyPassword'];
        }

        return $data;
    }
}
