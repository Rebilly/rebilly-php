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

class PayTabsCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('profileId', $data)) {
            $this->setProfileId($data['profileId']);
        }
        if (array_key_exists('clientKey', $data)) {
            $this->setClientKey($data['clientKey']);
        }
        if (array_key_exists('serverKey', $data)) {
            $this->setServerKey($data['serverKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getProfileId(): string
    {
        return $this->fields['profileId'];
    }

    public function setProfileId(string $profileId): static
    {
        $this->fields['profileId'] = $profileId;

        return $this;
    }

    public function getClientKey(): string
    {
        return $this->fields['clientKey'];
    }

    public function setClientKey(string $clientKey): static
    {
        $this->fields['clientKey'] = $clientKey;

        return $this;
    }

    public function getServerKey(): string
    {
        return $this->fields['serverKey'];
    }

    public function setServerKey(string $serverKey): static
    {
        $this->fields['serverKey'] = $serverKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('profileId', $this->fields)) {
            $data['profileId'] = $this->fields['profileId'];
        }
        if (array_key_exists('clientKey', $this->fields)) {
            $data['clientKey'] = $this->fields['clientKey'];
        }
        if (array_key_exists('serverKey', $this->fields)) {
            $data['serverKey'] = $this->fields['serverKey'];
        }

        return $data;
    }
}
