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

class Acl implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('scope', $data)) {
            $this->setScope($data['scope']);
        }
        if (array_key_exists('permissions', $data)) {
            $this->setPermissions($data['permissions']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScope(): ApiKeyScope
    {
        return $this->fields['scope'];
    }

    public function setScope(ApiKeyScope|array $scope): static
    {
        if (!($scope instanceof ApiKeyScope)) {
            $scope = ApiKeyScope::from($scope);
        }

        $this->fields['scope'] = $scope;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('scope', $this->fields)) {
            $data['scope'] = $this->fields['scope']->jsonSerialize();
        }
        if (array_key_exists('permissions', $this->fields)) {
            $data['permissions'] = $this->fields['permissions'];
        }

        return $data;
    }
}
