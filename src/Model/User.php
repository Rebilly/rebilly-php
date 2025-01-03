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

class User implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_PENDING_CONFIRMATION = 'pending-confirmation';

    private array $fields = [];

    public function __construct(array $data = [])
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
        if (array_key_exists('businessPhone', $data)) {
            $this->setBusinessPhone($data['businessPhone']);
        }
        if (array_key_exists('mobilePhone', $data)) {
            $this->setMobilePhone($data['mobilePhone']);
        }
        if (array_key_exists('permissions', $data)) {
            $this->setPermissions($data['permissions']);
        }
        if (array_key_exists('computedPermissions', $data)) {
            $this->setComputedPermissions($data['computedPermissions']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('loginTime', $data)) {
            $this->setLoginTime($data['loginTime']);
        }
        if (array_key_exists('reportingCurrency', $data)) {
            $this->setReportingCurrency($data['reportingCurrency']);
        }
        if (array_key_exists('availableCurrencies', $data)) {
            $this->setAvailableCurrencies($data['availableCurrencies']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('preferences', $data)) {
            $this->setPreferences($data['preferences']);
        }
        if (array_key_exists('roleIds', $data)) {
            $this->setRoleIds($data['roleIds']);
        }
        if (array_key_exists('allowedIps', $data)) {
            $this->setAllowedIps($data['allowedIps']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
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

    public function getBusinessPhone(): ?string
    {
        return $this->fields['businessPhone'] ?? null;
    }

    public function setBusinessPhone(null|string $businessPhone): static
    {
        $this->fields['businessPhone'] = $businessPhone;

        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->fields['mobilePhone'] ?? null;
    }

    public function setMobilePhone(null|string $mobilePhone): static
    {
        $this->fields['mobilePhone'] = $mobilePhone;

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
        $this->fields['permissions'] = $permissions;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getComputedPermissions(): ?array
    {
        return $this->fields['computedPermissions'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getLoginTime(): ?DateTimeImmutable
    {
        return $this->fields['loginTime'] ?? null;
    }

    public function getReportingCurrency(): ?string
    {
        return $this->fields['reportingCurrency'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getAvailableCurrencies(): ?array
    {
        return $this->fields['availableCurrencies'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function getPreferences(): ?array
    {
        return $this->fields['preferences'] ?? null;
    }

    public function setPreferences(null|array $preferences): static
    {
        $this->fields['preferences'] = $preferences;

        return $this;
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
        $this->fields['roleIds'] = $roleIds;

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
        $this->fields['allowedIps'] = $allowedIps;

        return $this;
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
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('businessPhone', $this->fields)) {
            $data['businessPhone'] = $this->fields['businessPhone'];
        }
        if (array_key_exists('mobilePhone', $this->fields)) {
            $data['mobilePhone'] = $this->fields['mobilePhone'];
        }
        if (array_key_exists('permissions', $this->fields)) {
            $data['permissions'] = $this->fields['permissions'];
        }
        if (array_key_exists('computedPermissions', $this->fields)) {
            $data['computedPermissions'] = $this->fields['computedPermissions'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('loginTime', $this->fields)) {
            $data['loginTime'] = $this->fields['loginTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('reportingCurrency', $this->fields)) {
            $data['reportingCurrency'] = $this->fields['reportingCurrency'];
        }
        if (array_key_exists('availableCurrencies', $this->fields)) {
            $data['availableCurrencies'] = $this->fields['availableCurrencies'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('preferences', $this->fields)) {
            $data['preferences'] = $this->fields['preferences'];
        }
        if (array_key_exists('roleIds', $this->fields)) {
            $data['roleIds'] = $this->fields['roleIds'];
        }
        if (array_key_exists('allowedIps', $this->fields)) {
            $data['allowedIps'] = $this->fields['allowedIps'];
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

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @param null|string[] $computedPermissions
     */
    private function setComputedPermissions(null|array $computedPermissions): static
    {
        $this->fields['computedPermissions'] = $computedPermissions;

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

    private function setLoginTime(null|DateTimeImmutable|string $loginTime): static
    {
        if ($loginTime !== null && !($loginTime instanceof DateTimeImmutable)) {
            $loginTime = new DateTimeImmutable($loginTime);
        }

        $this->fields['loginTime'] = $loginTime;

        return $this;
    }

    private function setReportingCurrency(null|string $reportingCurrency): static
    {
        $this->fields['reportingCurrency'] = $reportingCurrency;

        return $this;
    }

    /**
     * @param null|string[] $availableCurrencies
     */
    private function setAvailableCurrencies(null|array $availableCurrencies): static
    {
        $this->fields['availableCurrencies'] = $availableCurrencies;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

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
