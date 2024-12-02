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
use JsonSerializable;

class ContactObject implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('organization', $data)) {
            $this->setOrganization($data['organization']);
        }
        if (array_key_exists('address', $data)) {
            $this->setAddress($data['address']);
        }
        if (array_key_exists('address2', $data)) {
            $this->setAddress2($data['address2']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('postalCode', $data)) {
            $this->setPostalCode($data['postalCode']);
        }
        if (array_key_exists('phoneNumbers', $data)) {
            $this->setPhoneNumbers($data['phoneNumbers']);
        }
        if (array_key_exists('emails', $data)) {
            $this->setEmails($data['emails']);
        }
        if (array_key_exists('dob', $data)) {
            $this->setDob($data['dob']);
        }
        if (array_key_exists('jobTitle', $data)) {
            $this->setJobTitle($data['jobTitle']);
        }
        if (array_key_exists('hash', $data)) {
            $this->setHash($data['hash']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|string $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|string $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getOrganization(): ?string
    {
        return $this->fields['organization'] ?? null;
    }

    public function setOrganization(null|string $organization): static
    {
        $this->fields['organization'] = $organization;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->fields['address'] ?? null;
    }

    public function setAddress(null|string $address): static
    {
        $this->fields['address'] = $address;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->fields['address2'] ?? null;
    }

    public function setAddress2(null|string $address2): static
    {
        $this->fields['address2'] = $address2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|string $region): static
    {
        $this->fields['region'] = $region;

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

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|string $postalCode): static
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    /**
     * @return null|ContactPhoneNumbers[]
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->fields['phoneNumbers'] ?? null;
    }

    /**
     * @param null|array[]|ContactPhoneNumbers[] $phoneNumbers
     */
    public function setPhoneNumbers(null|array $phoneNumbers): static
    {
        $phoneNumbers = $phoneNumbers !== null ? array_map(
            fn ($value) => $value instanceof ContactPhoneNumbers ? $value : ContactPhoneNumbers::from($value),
            $phoneNumbers,
        ) : null;

        $this->fields['phoneNumbers'] = $phoneNumbers;

        return $this;
    }

    /**
     * @return null|ContactEmails[]
     */
    public function getEmails(): ?array
    {
        return $this->fields['emails'] ?? null;
    }

    /**
     * @param null|array[]|ContactEmails[] $emails
     */
    public function setEmails(null|array $emails): static
    {
        $emails = $emails !== null ? array_map(
            fn ($value) => $value instanceof ContactEmails ? $value : ContactEmails::from($value),
            $emails,
        ) : null;

        $this->fields['emails'] = $emails;

        return $this;
    }

    public function getDob(): ?DateTimeImmutable
    {
        return $this->fields['dob'] ?? null;
    }

    public function setDob(null|DateTimeImmutable|string $dob): static
    {
        if ($dob !== null && !($dob instanceof DateTimeImmutable)) {
            $dob = new DateTimeImmutable($dob);
        }

        $this->fields['dob'] = $dob;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->fields['jobTitle'] ?? null;
    }

    public function setJobTitle(null|string $jobTitle): static
    {
        $this->fields['jobTitle'] = $jobTitle;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->fields['hash'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization'];
        }
        if (array_key_exists('address', $this->fields)) {
            $data['address'] = $this->fields['address'];
        }
        if (array_key_exists('address2', $this->fields)) {
            $data['address2'] = $this->fields['address2'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('postalCode', $this->fields)) {
            $data['postalCode'] = $this->fields['postalCode'];
        }
        if (array_key_exists('phoneNumbers', $this->fields)) {
            $data['phoneNumbers'] = $this->fields['phoneNumbers'] !== null
                ? array_map(
                    static fn (ContactPhoneNumbers $contactPhoneNumbers) => $contactPhoneNumbers->jsonSerialize(),
                    $this->fields['phoneNumbers'],
                )
                : null;
        }
        if (array_key_exists('emails', $this->fields)) {
            $data['emails'] = $this->fields['emails'] !== null
                ? array_map(
                    static fn (ContactEmails $contactEmails) => $contactEmails->jsonSerialize(),
                    $this->fields['emails'],
                )
                : null;
        }
        if (array_key_exists('dob', $this->fields)) {
            $data['dob'] = $this->fields['dob']?->format('Y-m-d');
        }
        if (array_key_exists('jobTitle', $this->fields)) {
            $data['jobTitle'] = $this->fields['jobTitle'];
        }
        if (array_key_exists('hash', $this->fields)) {
            $data['hash'] = $this->fields['hash'];
        }

        return $data;
    }

    private function setHash(null|string $hash): static
    {
        $this->fields['hash'] = $hash;

        return $this;
    }
}
