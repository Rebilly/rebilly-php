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

class KycSettingsAddressWeights implements JsonSerializable
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
        if (array_key_exists('line1', $data)) {
            $this->setLine1($data['line1']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('postalCode', $data)) {
            $this->setPostalCode($data['postalCode']);
        }
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('phone', $data)) {
            $this->setPhone($data['phone']);
        }
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
        }
        if (array_key_exists('isTampered', $data)) {
            $this->setIsTampered($data['isTampered']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFirstName(): ?int
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|int $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?int
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|int $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getLine1(): ?int
    {
        return $this->fields['line1'] ?? null;
    }

    public function setLine1(null|int $line1): static
    {
        $this->fields['line1'] = $line1;

        return $this;
    }

    public function getCity(): ?int
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|int $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?int
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|int $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|int $postalCode): static
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|int $date): static
    {
        $this->fields['date'] = $date;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->fields['phone'] ?? null;
    }

    public function setPhone(null|int $phone): static
    {
        $this->fields['phone'] = $phone;

        return $this;
    }

    public function getDocumentSubtype(): ?int
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|int $documentSubtype): static
    {
        $this->fields['documentSubtype'] = $documentSubtype;

        return $this;
    }

    public function getIsTampered(): ?int
    {
        return $this->fields['isTampered'] ?? null;
    }

    public function setIsTampered(null|int $isTampered): static
    {
        $this->fields['isTampered'] = $isTampered;

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
        if (array_key_exists('line1', $this->fields)) {
            $data['line1'] = $this->fields['line1'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('postalCode', $this->fields)) {
            $data['postalCode'] = $this->fields['postalCode'];
        }
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date'];
        }
        if (array_key_exists('phone', $this->fields)) {
            $data['phone'] = $this->fields['phone'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
        }
        if (array_key_exists('isTampered', $this->fields)) {
            $data['isTampered'] = $this->fields['isTampered'];
        }

        return $data;
    }
}
