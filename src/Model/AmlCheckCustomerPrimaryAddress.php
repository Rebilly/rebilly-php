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
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
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

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function getDob(): ?DateTimeImmutable
    {
        return $this->fields['dob'] ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
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
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }

        return $data;
    }

    private function setFirstName(null|string $firstName): self
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    private function setLastName(null|string $lastName): self
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    private function setDob(null|DateTimeImmutable|string $dob): self
    {
        if ($dob !== null && !($dob instanceof DateTimeImmutable)) {
            $dob = new DateTimeImmutable($dob);
        }

        $this->fields['dob'] = $dob;

        return $this;
    }

    private function setCountry(null|string $country): self
    {
        $this->fields['country'] = $country;

        return $this;
    }
}
