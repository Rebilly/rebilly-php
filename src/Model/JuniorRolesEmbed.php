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

class JuniorRolesEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('juniors', $data)) {
            $this->setJuniors($data['juniors']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|\Rebilly\Sdk\Model\Role[]
     */
    public function getJuniors(): ?array
    {
        return $this->fields['juniors'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\Role[] $juniors
     */
    public function setJuniors(null|array $juniors): self
    {
        $juniors = $juniors !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Role ? $value : \Rebilly\Sdk\Model\Role::from($value)) : null, $juniors) : null;

        $this->fields['juniors'] = $juniors;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('juniors', $this->fields)) {
            $data['juniors'] = $this->fields['juniors'];
        }

        return $data;
    }
}
