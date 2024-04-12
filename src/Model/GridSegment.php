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

class GridSegment implements JsonSerializable
{
    public const SCOPE_PRIVATE = 'private';

    public const SCOPE_PUBLIC = 'public';

    public const SCOPE_SHARED = 'shared';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('owner', $data)) {
            $this->setOwner($data['owner']);
        }
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
        if (array_key_exists('isStarred', $data)) {
            $this->setIsStarred($data['isStarred']);
        }
        if (array_key_exists('isVisible', $data)) {
            $this->setIsVisible($data['isVisible']);
        }
        if (array_key_exists('userIds', $data)) {
            $this->setUserIds($data['userIds']);
        }
        if (array_key_exists('users', $data)) {
            $this->setUsers($data['users']);
        }
        if (array_key_exists('scope', $data)) {
            $this->setScope($data['scope']);
        }
        if (array_key_exists('systemId', $data)) {
            $this->setSystemId($data['systemId']);
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

    public function getOwner(): GridSegmentOwner
    {
        return $this->fields['owner'];
    }

    public function setOwner(GridSegmentOwner|array $owner): static
    {
        if (!($owner instanceof GridSegmentOwner)) {
            $owner = GridSegmentOwner::from($owner);
        }

        $this->fields['owner'] = $owner;

        return $this;
    }

    public function getData(): array
    {
        return $this->fields['data'];
    }

    public function setData(array $data): static
    {
        $this->fields['data'] = $data;

        return $this;
    }

    public function getIsStarred(): ?bool
    {
        return $this->fields['isStarred'] ?? null;
    }

    public function setIsStarred(null|bool $isStarred): static
    {
        $this->fields['isStarred'] = $isStarred;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->fields['isVisible'] ?? null;
    }

    public function setIsVisible(null|bool $isVisible): static
    {
        $this->fields['isVisible'] = $isVisible;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getUserIds(): ?array
    {
        return $this->fields['userIds'] ?? null;
    }

    /**
     * @param null|string[] $userIds
     */
    public function setUserIds(null|array $userIds): static
    {
        $this->fields['userIds'] = $userIds;

        return $this;
    }

    /**
     * @return null|GridSegmentUsers[]
     */
    public function getUsers(): ?array
    {
        return $this->fields['users'] ?? null;
    }

    public function getScope(): string
    {
        return $this->fields['scope'];
    }

    public function setScope(string $scope): static
    {
        $this->fields['scope'] = $scope;

        return $this;
    }

    public function getSystemId(): ?string
    {
        return $this->fields['systemId'] ?? null;
    }

    public function setSystemId(null|string $systemId): static
    {
        $this->fields['systemId'] = $systemId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('owner', $this->fields)) {
            $data['owner'] = $this->fields['owner']->jsonSerialize();
        }
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data'];
        }
        if (array_key_exists('isStarred', $this->fields)) {
            $data['isStarred'] = $this->fields['isStarred'];
        }
        if (array_key_exists('isVisible', $this->fields)) {
            $data['isVisible'] = $this->fields['isVisible'];
        }
        if (array_key_exists('userIds', $this->fields)) {
            $data['userIds'] = $this->fields['userIds'];
        }
        if (array_key_exists('users', $this->fields)) {
            $data['users'] = $this->fields['users'] !== null
                ? array_map(
                    static fn (GridSegmentUsers $gridSegmentUsers) => $gridSegmentUsers->jsonSerialize(),
                    $this->fields['users'],
                )
                : null;
        }
        if (array_key_exists('scope', $this->fields)) {
            $data['scope'] = $this->fields['scope'];
        }
        if (array_key_exists('systemId', $this->fields)) {
            $data['systemId'] = $this->fields['systemId'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @param null|array[]|GridSegmentUsers[] $users
     */
    private function setUsers(null|array $users): static
    {
        $users = $users !== null ? array_map(
            fn ($value) => $value instanceof GridSegmentUsers ? $value : GridSegmentUsers::from($value),
            $users,
        ) : null;

        $this->fields['users'] = $users;

        return $this;
    }
}
