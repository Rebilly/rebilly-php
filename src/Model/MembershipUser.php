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

class MembershipUser implements JsonSerializable
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
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
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

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->fields['email'] ?? null;
    }

    public function setEmail(null|string $email): static
    {
        $this->fields['email'] = $email;

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
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }

        return $data;
    }
}
