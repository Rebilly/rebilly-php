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

class MembershipEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('roles', $data)) {
            $this->setRoles($data['roles']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|Role[]
     */
    public function getRoles(): ?array
    {
        return $this->fields['roles'] ?? null;
    }

    /**
     * @param null|array[]|Role[] $roles
     */
    public function setRoles(null|array $roles): static
    {
        $roles = $roles !== null ? array_map(
            fn ($value) => $value instanceof Role ? $value : Role::from($value),
            $roles,
        ) : null;

        $this->fields['roles'] = $roles;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('roles', $this->fields)) {
            $data['roles'] = $this->fields['roles'] !== null
                ? array_map(
                    static fn (Role $role) => $role->jsonSerialize(),
                    $this->fields['roles'],
                )
                : null;
        }

        return $data;
    }
}
