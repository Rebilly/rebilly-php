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

class CreditFileCommonDecisionData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('lastNameMatch', $data)) {
            $this->setLastNameMatch($data['lastNameMatch']);
        }
        if (array_key_exists('firstNameMatch', $data)) {
            $this->setFirstNameMatch($data['firstNameMatch']);
        }
        if (array_key_exists('civicNumberMatch', $data)) {
            $this->setCivicNumberMatch($data['civicNumberMatch']);
        }
        if (array_key_exists('streetNameMatch', $data)) {
            $this->setStreetNameMatch($data['streetNameMatch']);
        }
        if (array_key_exists('cityMatch', $data)) {
            $this->setCityMatch($data['cityMatch']);
        }
        if (array_key_exists('postalCodeMatch', $data)) {
            $this->setPostalCodeMatch($data['postalCodeMatch']);
        }
        if (array_key_exists('provinceMatch', $data)) {
            $this->setProvinceMatch($data['provinceMatch']);
        }
        if (array_key_exists('dateOfBirthMatch', $data)) {
            $this->setDateOfBirthMatch($data['dateOfBirthMatch']);
        }
        if (array_key_exists('ageOfCreditFileThreeOrMoreYearsOld', $data)) {
            $this->setAgeOfCreditFileThreeOrMoreYearsOld($data['ageOfCreditFileThreeOrMoreYearsOld']);
        }
        if (array_key_exists('addressAsReported', $data)) {
            $this->setAddressAsReported($data['addressAsReported']);
        }
        if (array_key_exists('nameAsReported', $data)) {
            $this->setNameAsReported($data['nameAsReported']);
        }
        if (array_key_exists('dateOfBirthAsReported', $data)) {
            $this->setDateOfBirthAsReported($data['dateOfBirthAsReported']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getLastNameMatch(): ?string
    {
        return $this->fields['lastNameMatch'] ?? null;
    }

    public function getFirstNameMatch(): ?string
    {
        return $this->fields['firstNameMatch'] ?? null;
    }

    public function getCivicNumberMatch(): ?string
    {
        return $this->fields['civicNumberMatch'] ?? null;
    }

    public function getStreetNameMatch(): ?string
    {
        return $this->fields['streetNameMatch'] ?? null;
    }

    public function getCityMatch(): ?string
    {
        return $this->fields['cityMatch'] ?? null;
    }

    public function getPostalCodeMatch(): ?string
    {
        return $this->fields['postalCodeMatch'] ?? null;
    }

    public function getProvinceMatch(): ?string
    {
        return $this->fields['provinceMatch'] ?? null;
    }

    public function getDateOfBirthMatch(): ?string
    {
        return $this->fields['dateOfBirthMatch'] ?? null;
    }

    public function getAgeOfCreditFileThreeOrMoreYearsOld(): ?string
    {
        return $this->fields['ageOfCreditFileThreeOrMoreYearsOld'] ?? null;
    }

    public function getAddressAsReported(): ?string
    {
        return $this->fields['addressAsReported'] ?? null;
    }

    public function getNameAsReported(): ?string
    {
        return $this->fields['nameAsReported'] ?? null;
    }

    public function getDateOfBirthAsReported(): ?string
    {
        return $this->fields['dateOfBirthAsReported'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('lastNameMatch', $this->fields)) {
            $data['lastNameMatch'] = $this->fields['lastNameMatch'];
        }
        if (array_key_exists('firstNameMatch', $this->fields)) {
            $data['firstNameMatch'] = $this->fields['firstNameMatch'];
        }
        if (array_key_exists('civicNumberMatch', $this->fields)) {
            $data['civicNumberMatch'] = $this->fields['civicNumberMatch'];
        }
        if (array_key_exists('streetNameMatch', $this->fields)) {
            $data['streetNameMatch'] = $this->fields['streetNameMatch'];
        }
        if (array_key_exists('cityMatch', $this->fields)) {
            $data['cityMatch'] = $this->fields['cityMatch'];
        }
        if (array_key_exists('postalCodeMatch', $this->fields)) {
            $data['postalCodeMatch'] = $this->fields['postalCodeMatch'];
        }
        if (array_key_exists('provinceMatch', $this->fields)) {
            $data['provinceMatch'] = $this->fields['provinceMatch'];
        }
        if (array_key_exists('dateOfBirthMatch', $this->fields)) {
            $data['dateOfBirthMatch'] = $this->fields['dateOfBirthMatch'];
        }
        if (array_key_exists('ageOfCreditFileThreeOrMoreYearsOld', $this->fields)) {
            $data['ageOfCreditFileThreeOrMoreYearsOld'] = $this->fields['ageOfCreditFileThreeOrMoreYearsOld'];
        }
        if (array_key_exists('addressAsReported', $this->fields)) {
            $data['addressAsReported'] = $this->fields['addressAsReported'];
        }
        if (array_key_exists('nameAsReported', $this->fields)) {
            $data['nameAsReported'] = $this->fields['nameAsReported'];
        }
        if (array_key_exists('dateOfBirthAsReported', $this->fields)) {
            $data['dateOfBirthAsReported'] = $this->fields['dateOfBirthAsReported'];
        }

        return $data;
    }

    private function setLastNameMatch(null|string $lastNameMatch): static
    {
        $this->fields['lastNameMatch'] = $lastNameMatch;

        return $this;
    }

    private function setFirstNameMatch(null|string $firstNameMatch): static
    {
        $this->fields['firstNameMatch'] = $firstNameMatch;

        return $this;
    }

    private function setCivicNumberMatch(null|string $civicNumberMatch): static
    {
        $this->fields['civicNumberMatch'] = $civicNumberMatch;

        return $this;
    }

    private function setStreetNameMatch(null|string $streetNameMatch): static
    {
        $this->fields['streetNameMatch'] = $streetNameMatch;

        return $this;
    }

    private function setCityMatch(null|string $cityMatch): static
    {
        $this->fields['cityMatch'] = $cityMatch;

        return $this;
    }

    private function setPostalCodeMatch(null|string $postalCodeMatch): static
    {
        $this->fields['postalCodeMatch'] = $postalCodeMatch;

        return $this;
    }

    private function setProvinceMatch(null|string $provinceMatch): static
    {
        $this->fields['provinceMatch'] = $provinceMatch;

        return $this;
    }

    private function setDateOfBirthMatch(null|string $dateOfBirthMatch): static
    {
        $this->fields['dateOfBirthMatch'] = $dateOfBirthMatch;

        return $this;
    }

    private function setAgeOfCreditFileThreeOrMoreYearsOld(null|string $ageOfCreditFileThreeOrMoreYearsOld): static
    {
        $this->fields['ageOfCreditFileThreeOrMoreYearsOld'] = $ageOfCreditFileThreeOrMoreYearsOld;

        return $this;
    }

    private function setAddressAsReported(null|string $addressAsReported): static
    {
        $this->fields['addressAsReported'] = $addressAsReported;

        return $this;
    }

    private function setNameAsReported(null|string $nameAsReported): static
    {
        $this->fields['nameAsReported'] = $nameAsReported;

        return $this;
    }

    private function setDateOfBirthAsReported(null|string $dateOfBirthAsReported): static
    {
        $this->fields['dateOfBirthAsReported'] = $dateOfBirthAsReported;

        return $this;
    }
}
