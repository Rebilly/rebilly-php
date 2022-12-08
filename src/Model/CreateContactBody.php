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

class CreateContactBody implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('emailAddresses', $data)) {
            $this->setEmailAddresses($data['emailAddresses']);
        }
        if (array_key_exists('phoneNumbers', $data)) {
            $this->setPhoneNumbers($data['phoneNumbers']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|CreateContactBodyEmailAddresses[]
     */
    public function getEmailAddresses(): ?array
    {
        return $this->fields['emailAddresses'] ?? null;
    }

    /**
     * @param null|CreateContactBodyEmailAddresses[] $emailAddresses
     */
    public function setEmailAddresses(null|array $emailAddresses): self
    {
        $emailAddresses = $emailAddresses !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CreateContactBodyEmailAddresses ? $value : CreateContactBodyEmailAddresses::from($value)) : null, $emailAddresses) : null;

        $this->fields['emailAddresses'] = $emailAddresses;

        return $this;
    }

    /**
     * @return null|CreateContactBodyPhoneNumbers[]
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->fields['phoneNumbers'] ?? null;
    }

    /**
     * @param null|CreateContactBodyPhoneNumbers[] $phoneNumbers
     */
    public function setPhoneNumbers(null|array $phoneNumbers): self
    {
        $phoneNumbers = $phoneNumbers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CreateContactBodyPhoneNumbers ? $value : CreateContactBodyPhoneNumbers::from($value)) : null, $phoneNumbers) : null;

        $this->fields['phoneNumbers'] = $phoneNumbers;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('emailAddresses', $this->fields)) {
            $data['emailAddresses'] = $this->fields['emailAddresses'];
        }
        if (array_key_exists('phoneNumbers', $this->fields)) {
            $data['phoneNumbers'] = $this->fields['phoneNumbers'];
        }

        return $data;
    }
}
