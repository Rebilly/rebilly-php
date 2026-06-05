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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;
use Rebilly\Sdk\Trait\HasMetadata;

class AccountRegistrationSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('isEnabled', $data)) {
            $this->setIsEnabled($data['isEnabled']);
        }
        if (array_key_exists('locations', $data)) {
            $this->setLocations($data['locations']);
        }
        if (array_key_exists('fields', $data)) {
            $this->setFields($data['fields']);
        }
        if (array_key_exists('realm', $data)) {
            $this->setRealm($data['realm']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getIsEnabled(): ?bool
    {
        return $this->fields['isEnabled'] ?? null;
    }

    public function setIsEnabled(null|bool $isEnabled): static
    {
        $this->fields['isEnabled'] = $isEnabled;

        return $this;
    }

    /**
     * @return null|AccountRegistrationSettingsLocations[]
     */
    public function getLocations(): ?array
    {
        return $this->fields['locations'] ?? null;
    }

    /**
     * @param null|AccountRegistrationSettingsLocations[]|array[] $locations
     */
    public function setLocations(null|array $locations): static
    {
        $locations = $locations !== null ? array_map(
            fn ($value) => $value instanceof AccountRegistrationSettingsLocations ? $value : AccountRegistrationSettingsLocations::from($value),
            $locations,
        ) : null;

        $this->fields['locations'] = $locations;

        return $this;
    }

    /**
     * @return null|RegistrationField[]
     */
    public function getFields(): ?array
    {
        return $this->fields['fields'] ?? null;
    }

    /**
     * @param null|array[]|RegistrationField[] $fields
     */
    public function setFields(null|array $fields): static
    {
        $fields = $fields !== null ? array_map(
            fn ($value) => $value instanceof RegistrationField ? $value : RegistrationField::from($value),
            $fields,
        ) : null;

        $this->fields['fields'] = $fields;

        return $this;
    }

    public function getRealm(): ?string
    {
        return $this->fields['realm'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
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
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('isEnabled', $this->fields)) {
            $data['isEnabled'] = $this->fields['isEnabled'];
        }
        if (array_key_exists('locations', $this->fields)) {
            $data['locations'] = $this->fields['locations'] !== null
                ? array_map(
                    static fn (AccountRegistrationSettingsLocations $accountRegistrationSettingsLocations) => $accountRegistrationSettingsLocations->jsonSerialize(),
                    $this->fields['locations'],
                )
                : null;
        }
        if (array_key_exists('fields', $this->fields)) {
            $data['fields'] = $this->fields['fields'] !== null
                ? array_map(
                    static fn (RegistrationField $registrationField) => $registrationField->jsonSerialize(),
                    $this->fields['fields'],
                )
                : null;
        }
        if (array_key_exists('realm', $this->fields)) {
            $data['realm'] = $this->fields['realm'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setRealm(null|string $realm): static
    {
        $this->fields['realm'] = $realm;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
