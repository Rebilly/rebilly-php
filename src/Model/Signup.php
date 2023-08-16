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

class Signup implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('company', $data)) {
            $this->setCompany($data['company']);
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
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('reportingCurrency', $data)) {
            $this->setReportingCurrency($data['reportingCurrency']);
        }
        if (array_key_exists('questionnaire', $data)) {
            $this->setQuestionnaire($data['questionnaire']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getCompany(): string
    {
        return $this->fields['company'];
    }

    public function setCompany(string $company): static
    {
        $this->fields['company'] = $company;

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

    public function getBusinessPhone(): string
    {
        return $this->fields['businessPhone'];
    }

    public function setBusinessPhone(string $businessPhone): static
    {
        $this->fields['businessPhone'] = $businessPhone;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): static
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getWebsite(): string
    {
        return $this->fields['website'];
    }

    public function setWebsite(string $website): static
    {
        $this->fields['website'] = $website;

        return $this;
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

    public function getReportingCurrency(): ?string
    {
        return $this->fields['reportingCurrency'] ?? null;
    }

    public function setReportingCurrency(null|string $reportingCurrency): static
    {
        $this->fields['reportingCurrency'] = $reportingCurrency;

        return $this;
    }

    public function getQuestionnaire(): ?OrganizationQuestionnaire
    {
        return $this->fields['questionnaire'] ?? null;
    }

    public function setQuestionnaire(null|OrganizationQuestionnaire|array $questionnaire): static
    {
        if ($questionnaire !== null && !($questionnaire instanceof OrganizationQuestionnaire)) {
            $questionnaire = OrganizationQuestionnaire::from($questionnaire);
        }

        $this->fields['questionnaire'] = $questionnaire;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }
        if (array_key_exists('company', $this->fields)) {
            $data['company'] = $this->fields['company'];
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
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('reportingCurrency', $this->fields)) {
            $data['reportingCurrency'] = $this->fields['reportingCurrency'];
        }
        if (array_key_exists('questionnaire', $this->fields)) {
            $data['questionnaire'] = $this->fields['questionnaire']?->jsonSerialize();
        }

        return $data;
    }
}
