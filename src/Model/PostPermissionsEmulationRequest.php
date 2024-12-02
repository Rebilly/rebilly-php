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

class PostPermissionsEmulationRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('permissions', $data)) {
            $this->setPermissions($data['permissions']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('permissions', $this->fields)) {
            $data['permissions'] = $this->fields['permissions'];
        }

        return $data;
    }
}
