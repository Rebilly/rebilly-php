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

class AMLAddress implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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
        if (array_key_exists('birthplace', $data)) {
            $this->setBirthplace($data['birthplace']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAddress(): ?string
    {
        return $this->fields['address'] ?? null;
    }

    public function getAddress2(): ?string
    {
        return $this->fields['address2'] ?? null;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function getBirthplace(): ?bool
    {
        return $this->fields['birthplace'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
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
        if (array_key_exists('birthplace', $this->fields)) {
            $data['birthplace'] = $this->fields['birthplace'];
        }

        return $data;
    }

    private function setAddress(null|string $address): static
    {
        $this->fields['address'] = $address;

        return $this;
    }

    private function setAddress2(null|string $address2): static
    {
        $this->fields['address2'] = $address2;

        return $this;
    }

    private function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    private function setRegion(null|string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    private function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    private function setBirthplace(null|bool $birthplace): static
    {
        $this->fields['birthplace'] = $birthplace;

        return $this;
    }
}
