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

class SecureTradingCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('notificationPassword', $data)) {
            $this->setNotificationPassword($data['notificationPassword']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->fields['username'];
    }

    public function setUsername(string $username): static
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getNotificationPassword(): ?string
    {
        return $this->fields['notificationPassword'] ?? null;
    }

    public function setNotificationPassword(null|string $notificationPassword): static
    {
        $this->fields['notificationPassword'] = $notificationPassword;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('notificationPassword', $this->fields)) {
            $data['notificationPassword'] = $this->fields['notificationPassword'];
        }

        return $data;
    }
}
