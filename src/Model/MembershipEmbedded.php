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

    public function getRoles(): ?array
    {
        return $this->fields['roles'] ?? null;
    }

    public function setRoles(null|array $roles): static
    {
        $this->fields['roles'] = $roles;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('roles', $this->fields)) {
            $data['roles'] = $this->fields['roles'];
        }

        return $data;
    }
}
