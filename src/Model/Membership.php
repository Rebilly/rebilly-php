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

class Membership implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('organization', $data)) {
            $this->setOrganization($data['organization']);
        }
        if (array_key_exists('user', $data)) {
            $this->setUser($data['user']);
        }
        if (array_key_exists('allowedIps', $data)) {
            $this->setAllowedIps($data['allowedIps']);
        }
        if (array_key_exists('permissions', $data)) {
            $this->setPermissions($data['permissions']);
        }
        if (array_key_exists('isOwner', $data)) {
            $this->setIsOwner($data['isOwner']);
        }
        if (array_key_exists('isDefault', $data)) {
            $this->setIsDefault($data['isDefault']);
        }
        if (array_key_exists('roleIds', $data)) {
            $this->setRoleIds($data['roleIds']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOrganization(): MembershipOrganization
    {
        return $this->fields['organization'];
    }

    public function setOrganization(MembershipOrganization|array $organization): static
    {
        if (!($organization instanceof MembershipOrganization)) {
            $organization = MembershipOrganization::from($organization);
        }

        $this->fields['organization'] = $organization;

        return $this;
    }

    public function getUser(): MembershipUser
    {
        return $this->fields['user'];
    }

    public function setUser(MembershipUser|array $user): static
    {
        if (!($user instanceof MembershipUser)) {
            $user = MembershipUser::from($user);
        }

        $this->fields['user'] = $user;

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
        $allowedIps = $allowedIps !== null ? array_map(fn ($value) => $value ?? null, $allowedIps) : null;

        $this->fields['allowedIps'] = $allowedIps;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getPermissions(): ?array
    {
        return $this->fields['permissions'] ?? null;
    }

    /**
     * @param null|string[] $permissions
     */
    public function setPermissions(null|array $permissions): static
    {
        $permissions = $permissions !== null ? array_map(fn ($value) => $value ?? null, $permissions) : null;

        $this->fields['permissions'] = $permissions;

        return $this;
    }

    public function getIsOwner(): ?bool
    {
        return $this->fields['isOwner'] ?? null;
    }

    public function setIsOwner(null|bool $isOwner): static
    {
        $this->fields['isOwner'] = $isOwner;

        return $this;
    }

    public function getIsDefault(): ?bool
    {
        return $this->fields['isDefault'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getRoleIds(): ?array
    {
        return $this->fields['roleIds'] ?? null;
    }

    /**
     * @param null|string[] $roleIds
     */
    public function setRoleIds(null|array $roleIds): static
    {
        $roleIds = $roleIds !== null ? array_map(fn ($value) => $value ?? null, $roleIds) : null;

        $this->fields['roleIds'] = $roleIds;

        return $this;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization']?->jsonSerialize();
        }
        if (array_key_exists('user', $this->fields)) {
            $data['user'] = $this->fields['user']?->jsonSerialize();
        }
        if (array_key_exists('allowedIps', $this->fields)) {
            $data['allowedIps'] = $this->fields['allowedIps'];
        }
        if (array_key_exists('permissions', $this->fields)) {
            $data['permissions'] = $this->fields['permissions'];
        }
        if (array_key_exists('isOwner', $this->fields)) {
            $data['isOwner'] = $this->fields['isOwner'];
        }
        if (array_key_exists('isDefault', $this->fields)) {
            $data['isDefault'] = $this->fields['isDefault'];
        }
        if (array_key_exists('roleIds', $this->fields)) {
            $data['roleIds'] = $this->fields['roleIds'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setIsDefault(null|bool $isDefault): static
    {
        $this->fields['isDefault'] = $isDefault;

        return $this;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
