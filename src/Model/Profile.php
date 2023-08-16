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

class Profile implements JsonSerializable
{
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
        if (array_key_exists('memberships', $data)) {
            $this->setMemberships($data['memberships']);
        }
        if (array_key_exists('availableCurrencies', $data)) {
            $this->setAvailableCurrencies($data['availableCurrencies']);
        }
        if (array_key_exists('reportingCurrency', $data)) {
            $this->setReportingCurrency($data['reportingCurrency']);
        }
        if (array_key_exists('totpRequired', $data)) {
            $this->setTotpRequired($data['totpRequired']);
        }
        if (array_key_exists('totpSecret', $data)) {
            $this->setTotpSecret($data['totpSecret']);
        }
        if (array_key_exists('totpUrl', $data)) {
            $this->setTotpUrl($data['totpUrl']);
        }
        if (array_key_exists('oneTimePassword', $data)) {
            $this->setOneTimePassword($data['oneTimePassword']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('preferences', $data)) {
            $this->setPreferences($data['preferences']);
        }
        if (array_key_exists('hasPermissionsEmulation', $data)) {
            $this->setHasPermissionsEmulation($data['hasPermissionsEmulation']);
        }
        if (array_key_exists('displayName', $data)) {
            $this->setDisplayName($data['displayName']);
        }
        if (array_key_exists('hash', $data)) {
            $this->setHash($data['hash']);
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

    public function getEmail(): ?string
    {
        return $this->fields['email'] ?? null;
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function getBusinessPhone(): ?string
    {
        return $this->fields['businessPhone'] ?? null;
    }

    public function getMobilePhone(): ?string
    {
        return $this->fields['mobilePhone'] ?? null;
    }

    /**
     * @return null|Membership[]
     */
    public function getMemberships(): ?array
    {
        return $this->fields['memberships'] ?? null;
    }

    /**
     * @param null|Membership[] $memberships
     */
    public function setMemberships(null|array $memberships): static
    {
        $memberships = $memberships !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof Membership ? $value : Membership::from($value)) : null, $memberships) : null;

        $this->fields['memberships'] = $memberships;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getAvailableCurrencies(): ?array
    {
        return $this->fields['availableCurrencies'] ?? null;
    }

    public function getReportingCurrency(): ?string
    {
        return $this->fields['reportingCurrency'] ?? null;
    }

    public function setReportingCurrency(null|string $reportingCurrency): static
    {
        $this->fields['reportingCurrency'] = $reportingCurrency;

        return $this;
    }

    public function getTotpRequired(): ?bool
    {
        return $this->fields['totpRequired'] ?? null;
    }

    public function setTotpRequired(null|bool $totpRequired): static
    {
        $this->fields['totpRequired'] = $totpRequired;

        return $this;
    }

    public function getTotpSecret(): ?string
    {
        return $this->fields['totpSecret'] ?? null;
    }

    public function getTotpUrl(): ?string
    {
        return $this->fields['totpUrl'] ?? null;
    }

    public function getOneTimePassword(): ?string
    {
        return $this->fields['oneTimePassword'] ?? null;
    }

    public function setOneTimePassword(null|string $oneTimePassword): static
    {
        $this->fields['oneTimePassword'] = $oneTimePassword;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
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

    public function getHasPermissionsEmulation(): ?bool
    {
        return $this->fields['hasPermissionsEmulation'] ?? null;
    }

    public function setHasPermissionsEmulation(null|bool $hasPermissionsEmulation): static
    {
        $this->fields['hasPermissionsEmulation'] = $hasPermissionsEmulation;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->fields['displayName'] ?? null;
    }

    public function setDisplayName(null|string $displayName): static
    {
        $this->fields['displayName'] = $displayName;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->fields['hash'] ?? null;
    }

    public function setHash(null|string $hash): static
    {
        $this->fields['hash'] = $hash;

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
        if (array_key_exists('businessPhone', $this->fields)) {
            $data['businessPhone'] = $this->fields['businessPhone'];
        }
        if (array_key_exists('mobilePhone', $this->fields)) {
            $data['mobilePhone'] = $this->fields['mobilePhone'];
        }
        if (array_key_exists('memberships', $this->fields)) {
            $data['memberships'] = $this->fields['memberships'];
        }
        if (array_key_exists('availableCurrencies', $this->fields)) {
            $data['availableCurrencies'] = $this->fields['availableCurrencies'];
        }
        if (array_key_exists('reportingCurrency', $this->fields)) {
            $data['reportingCurrency'] = $this->fields['reportingCurrency'];
        }
        if (array_key_exists('totpRequired', $this->fields)) {
            $data['totpRequired'] = $this->fields['totpRequired'];
        }
        if (array_key_exists('totpSecret', $this->fields)) {
            $data['totpSecret'] = $this->fields['totpSecret'];
        }
        if (array_key_exists('totpUrl', $this->fields)) {
            $data['totpUrl'] = $this->fields['totpUrl'];
        }
        if (array_key_exists('oneTimePassword', $this->fields)) {
            $data['oneTimePassword'] = $this->fields['oneTimePassword'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('preferences', $this->fields)) {
            $data['preferences'] = $this->fields['preferences'];
        }
        if (array_key_exists('hasPermissionsEmulation', $this->fields)) {
            $data['hasPermissionsEmulation'] = $this->fields['hasPermissionsEmulation'];
        }
        if (array_key_exists('displayName', $this->fields)) {
            $data['displayName'] = $this->fields['displayName'];
        }
        if (array_key_exists('hash', $this->fields)) {
            $data['hash'] = $this->fields['hash'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setEmail(null|string $email): static
    {
        $this->fields['email'] = $email;

        return $this;
    }

    private function setFirstName(null|string $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    private function setLastName(null|string $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    private function setBusinessPhone(null|string $businessPhone): static
    {
        $this->fields['businessPhone'] = $businessPhone;

        return $this;
    }

    private function setMobilePhone(null|string $mobilePhone): static
    {
        $this->fields['mobilePhone'] = $mobilePhone;

        return $this;
    }

    /**
     * @param null|string[] $availableCurrencies
     */
    private function setAvailableCurrencies(null|array $availableCurrencies): static
    {
        $availableCurrencies = $availableCurrencies !== null ? array_map(fn ($value) => $value ?? null, $availableCurrencies) : null;

        $this->fields['availableCurrencies'] = $availableCurrencies;

        return $this;
    }

    private function setTotpSecret(null|string $totpSecret): static
    {
        $this->fields['totpSecret'] = $totpSecret;

        return $this;
    }

    private function setTotpUrl(null|string $totpUrl): static
    {
        $this->fields['totpUrl'] = $totpUrl;

        return $this;
    }

    private function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }
}
