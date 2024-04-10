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

class RoleEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('juniorRoles', $data)) {
            $this->setJuniorRoles($data['juniorRoles']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getJuniorRoles(): ?Role
    {
        return $this->fields['juniorRoles'] ?? null;
    }

    public function setJuniorRoles(null|Role|array $juniorRoles): static
    {
        if ($juniorRoles !== null && !($juniorRoles instanceof Role)) {
            $juniorRoles = Role::from($juniorRoles);
        }

        $this->fields['juniorRoles'] = $juniorRoles;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('juniorRoles', $this->fields)) {
            $data['juniorRoles'] = $this->fields['juniorRoles']?->jsonSerialize();
        }

        return $data;
    }
}
