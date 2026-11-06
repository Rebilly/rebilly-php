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
use Rebilly\Sdk\Trait\HasMetadata;

class OrganizationApiKeyOwner implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getId(): string
    {
        return $this->fields['id'];
    }

    public function setId(string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->fields['email'];
    }

    public function setEmail(string $email): static
    {
        $this->fields['email'] = $email;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->fields['firstName'];
    }

    public function setFirstName(string $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->fields['lastName'];
    }

    public function setLastName(string $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }

        return $data;
    }
}
