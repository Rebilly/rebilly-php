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
use JsonSerializable;

class OAuth2Credential implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('hash', $data)) {
            $this->setHash($data['hash']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('deactivationTime', $data)) {
            $this->setDeactivationTime($data['deactivationTime']);
        }
        if (array_key_exists('service', $data)) {
            $this->setService($data['service']);
        }
        if (array_key_exists('code', $data)) {
            $this->setCode($data['code']);
        }
        if (array_key_exists('accessToken', $data)) {
            $this->setAccessToken($data['accessToken']);
        }
        if (array_key_exists('refreshToken', $data)) {
            $this->setRefreshToken($data['refreshToken']);
        }
        if (array_key_exists('scopes', $data)) {
            $this->setScopes($data['scopes']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getHash(): ?string
    {
        return $this->fields['hash'] ?? null;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getDeactivationTime(): ?DateTimeImmutable
    {
        return $this->fields['deactivationTime'] ?? null;
    }

    public function setDeactivationTime(null|DateTimeImmutable|string $deactivationTime): static
    {
        if ($deactivationTime !== null && !($deactivationTime instanceof DateTimeImmutable)) {
            $deactivationTime = new DateTimeImmutable($deactivationTime);
        }

        $this->fields['deactivationTime'] = $deactivationTime;

        return $this;
    }

    public function getService(): OAuth2CredentialService
    {
        return $this->fields['service'];
    }

    public function setService(OAuth2CredentialService|string $service): static
    {
        if (!($service instanceof OAuth2CredentialService)) {
            $service = OAuth2CredentialService::from($service);
        }

        $this->fields['service'] = $service;

        return $this;
    }

    public function getCode(): string
    {
        return $this->fields['code'];
    }

    public function setCode(string $code): static
    {
        $this->fields['code'] = $code;

        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->fields['accessToken'] ?? null;
    }

    public function getRefreshToken(): ?string
    {
        return $this->fields['refreshToken'] ?? null;
    }

    /**
     * @return string[]
     */
    public function getScopes(): array
    {
        return $this->fields['scopes'];
    }

    /**
     * @param string[] $scopes
     */
    public function setScopes(array $scopes): static
    {
        $scopes = array_map(fn ($value) => $value ?? null, $scopes);

        $this->fields['scopes'] = $scopes;

        return $this;
    }

    /**
     * @return null|array<SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('hash', $this->fields)) {
            $data['hash'] = $this->fields['hash'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('deactivationTime', $this->fields)) {
            $data['deactivationTime'] = $this->fields['deactivationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('service', $this->fields)) {
            $data['service'] = $this->fields['service']?->value;
        }
        if (array_key_exists('code', $this->fields)) {
            $data['code'] = $this->fields['code'];
        }
        if (array_key_exists('accessToken', $this->fields)) {
            $data['accessToken'] = $this->fields['accessToken'];
        }
        if (array_key_exists('refreshToken', $this->fields)) {
            $data['refreshToken'] = $this->fields['refreshToken'];
        }
        if (array_key_exists('scopes', $this->fields)) {
            $data['scopes'] = $this->fields['scopes'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setHash(null|string $hash): static
    {
        $this->fields['hash'] = $hash;

        return $this;
    }

    private function setAccessToken(null|string $accessToken): static
    {
        $this->fields['accessToken'] = $accessToken;

        return $this;
    }

    private function setRefreshToken(null|string $refreshToken): static
    {
        $this->fields['refreshToken'] = $refreshToken;

        return $this;
    }

    /**
     * @param null|array<SelfLink> $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
