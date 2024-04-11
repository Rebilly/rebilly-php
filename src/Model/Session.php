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

class Session implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('permissions', $data)) {
            $this->setPermissions($data['permissions']);
        }
        if (array_key_exists('userId', $data)) {
            $this->setUserId($data['userId']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function setToken(null|string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getPermissions(): array
    {
        return $this->fields['permissions'];
    }

    /**
     * @param string[] $permissions
     */
    public function setPermissions(array $permissions): static
    {
        $this->fields['permissions'] = $permissions;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->fields['userId'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('permissions', $this->fields)) {
            $data['permissions'] = $this->fields['permissions'];
        }
        if (array_key_exists('userId', $this->fields)) {
            $data['userId'] = $this->fields['userId'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expiredTime', $this->fields)) {
            $data['expiredTime'] = $this->fields['expiredTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
        }

        private function setUserId(null|string $userId): static
        {
            $this->fields['userId'] = $userId;

            return $this;
        }

        private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
        {
            if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
                $createdTime = new DateTimeImmutable($createdTime);
            }

            $this->fields['createdTime'] = $createdTime;

            return $this;
        }

        private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
        {
            if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
                $updatedTime = new DateTimeImmutable($updatedTime);
            }

            $this->fields['updatedTime'] = $updatedTime;

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
