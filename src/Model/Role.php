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

class Role implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('acl', $data)) {
            $this->setAcl($data['acl']);
        }
        if (array_key_exists('allowedIps', $data)) {
            $this->setAllowedIps($data['allowedIps']);
        }
        if (array_key_exists('seniorIds', $data)) {
            $this->setSeniorIds($data['seniorIds']);
        }
        if (array_key_exists('juniorIds', $data)) {
            $this->setJuniorIds($data['juniorIds']);
        }
        if (array_key_exists('usersCount', $data)) {
            $this->setUsersCount($data['usersCount']);
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
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
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

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    /**
     * @return Acl[]
     */
    public function getAcl(): array
    {
        return $this->fields['acl'];
    }

    /**
     * @param Acl[]|array[] $acl
     */
    public function setAcl(array $acl): static
    {
        $acl = array_map(
            fn ($value) => $value instanceof Acl ? $value : Acl::from($value),
            $acl,
        );

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

    /**
     * @return null|string[]
     */
    public function getSeniorIds(): ?array
    {
        return $this->fields['seniorIds'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getJuniorIds(): ?array
    {
        return $this->fields['juniorIds'] ?? null;
    }

    /**
     * @param null|string[] $juniorIds
     */
    public function setJuniorIds(null|array $juniorIds): static
    {
        $this->fields['juniorIds'] = $juniorIds;

        return $this;
    }

    public function getUsersCount(): ?int
    {
        return $this->fields['usersCount'] ?? null;
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

    public function getEmbedded(): ?RoleEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|RoleEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof RoleEmbedded)) {
            $embedded = RoleEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('acl', $this->fields)) {
            $data['acl'] = array_map(
                static fn (Acl $acl) => $acl->jsonSerialize(),
                $this->fields['acl'],
            );
        }
        if (array_key_exists('allowedIps', $this->fields)) {
            $data['allowedIps'] = $this->fields['allowedIps'];
        }
        if (array_key_exists('seniorIds', $this->fields)) {
            $data['seniorIds'] = $this->fields['seniorIds'];
        }
        if (array_key_exists('juniorIds', $this->fields)) {
            $data['juniorIds'] = $this->fields['juniorIds'];
        }
        if (array_key_exists('usersCount', $this->fields)) {
            $data['usersCount'] = $this->fields['usersCount'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @param null|string[] $seniorIds
     */
    private function setSeniorIds(null|array $seniorIds): static
    {
        $this->fields['seniorIds'] = $seniorIds;

        return $this;
    }

    private function setUsersCount(null|int $usersCount): static
    {
        $this->fields['usersCount'] = $usersCount;

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
