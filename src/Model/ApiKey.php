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

class ApiKey implements JsonSerializable
{
    public const TYPE_SECRET = 'secret';

    public const TYPE_PUBLISHABLE = 'publishable';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('acl', $data)) {
            $this->setAcl($data['acl']);
        }
        if (array_key_exists('allowedIps', $data)) {
            $this->setAllowedIps($data['allowedIps']);
        }
        if (array_key_exists('apiUser', $data)) {
            $this->setApiUser($data['apiUser']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
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

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @return null|Acl[]
     */
    public function getAcl(): ?array
    {
        return $this->fields['acl'] ?? null;
    }

    /**
     * @param null|Acl[]|array[] $acl
     */
    public function setAcl(null|array $acl): static
    {
        $acl = $acl !== null ? array_map(
            fn ($value) => $value instanceof Acl ? $value : Acl::from($value),
            $acl,
        ) : null;

        $this->fields['acl'] = $acl;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getAllowedIps(): ?array
    {
        return $this->fields['allowedIps'] ?? null;
    }

    /**
     * @param null|string[] $allowedIps
     */
    public function setAllowedIps(null|array $allowedIps): static
    {
        $this->fields['allowedIps'] = $allowedIps;

        return $this;
    }

    public function getApiUser(): ?string
    {
        return $this->fields['apiUser'] ?? null;
    }

    public function getSecretKey(): ?string
    {
        return $this->fields['secretKey'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('acl', $this->fields)) {
            $data['acl'] = $this->fields['acl'];
        }
        if (array_key_exists('allowedIps', $this->fields)) {
            $data['allowedIps'] = $this->fields['allowedIps'];
        }
        if (array_key_exists('apiUser', $this->fields)) {
            $data['apiUser'] = $this->fields['apiUser'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
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

    private function setApiUser(null|string $apiUser): static
    {
        $this->fields['apiUser'] = $apiUser;

        return $this;
    }

    private function setSecretKey(null|string $secretKey): static
    {
        $this->fields['secretKey'] = $secretKey;

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
