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

class PayRedeemCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiUser', $data)) {
            $this->setApiUser($data['apiUser']);
        }
        if (array_key_exists('apiPassword', $data)) {
            $this->setApiPassword($data['apiPassword']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiUser(): string
    {
        return $this->fields['apiUser'];
    }

    public function setApiUser(string $apiUser): static
    {
        $this->fields['apiUser'] = $apiUser;

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

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): static
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiUser', $this->fields)) {
            $data['apiUser'] = $this->fields['apiUser'];
        }
        if (array_key_exists('apiPassword', $this->fields)) {
            $data['apiPassword'] = $this->fields['apiPassword'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }

        return $data;
    }
}
