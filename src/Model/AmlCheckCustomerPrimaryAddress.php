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

class AmlCheckCustomerPrimaryAddress implements JsonSerializable
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
        if (array_key_exists('dob', $data)) {
            $this->setDob($data['dob']);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('dob', $this->fields)) {
            $data['dob'] = $this->fields['dob']?->format('Y-m-d');
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

        return $data;
    }
}
