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

use DateTimeImmutable;
use DateTimeInterface;

class AuthenticationTokenPasswordMode implements AuthenticationToken
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('otpRequired', $data)) {
            $this->setOtpRequired($data['otpRequired']);
        }
        if (array_key_exists('credentialId', $data)) {
            $this->setCredentialId($data['credentialId']);
        }
        if (array_key_exists('expiredTime', $data)) {
            $this->setExpiredTime($data['expiredTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMode(): string
    {
        return 'password';
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

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function getOtpRequired(): ?bool
    {
        return $this->fields['otpRequired'] ?? null;
    }

    public function setOtpRequired(null|bool $otpRequired): static
    {
        $this->fields['otpRequired'] = $otpRequired;

        return $this;
    }

    public function getCredentialId(): ?string
    {
        return $this->fields['credentialId'] ?? null;
    }

    public function getExpiredTime(): ?DateTimeImmutable
    {
        return $this->fields['expiredTime'] ?? null;
    }

    public function setExpiredTime(null|DateTimeImmutable|string $expiredTime): static
    {
        if ($expiredTime !== null && !($expiredTime instanceof DateTimeImmutable)) {
            $expiredTime = new DateTimeImmutable($expiredTime);
        }

        $this->fields['expiredTime'] = $expiredTime;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'mode' => 'password',
        ];
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('otpRequired', $this->fields)) {
            $data['otpRequired'] = $this->fields['otpRequired'];
        }
        if (array_key_exists('credentialId', $this->fields)) {
            $data['credentialId'] = $this->fields['credentialId'];
        }
        if (array_key_exists('expiredTime', $this->fields)) {
            $data['expiredTime'] = $this->fields['expiredTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    private function setToken(null|string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }

    private function setCredentialId(null|string $credentialId): static
    {
        $this->fields['credentialId'] = $credentialId;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
