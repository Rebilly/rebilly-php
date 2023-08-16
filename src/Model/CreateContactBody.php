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
        if (array_key_exists('email_addresses', $data)) {
            $this->setEmailAddresses($data['email_addresses']);
        }
        if (array_key_exists('phone_numbers', $data)) {
            $this->setPhoneNumbers($data['phone_numbers']);
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
        return $this->fields['email_addresses'] ?? null;
    }

    /**
     * @param null|CreateContactBodyEmailAddresses[] $emailAddresses
     */
    public function setEmailAddresses(null|array $emailAddresses): static
    {
        $emailAddresses = $emailAddresses !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CreateContactBodyEmailAddresses ? $value : CreateContactBodyEmailAddresses::from($value)) : null, $emailAddresses) : null;

        $this->fields['email_addresses'] = $emailAddresses;

        return $this;
    }

    /**
     * @return null|CreateContactBodyPhoneNumbers[]
     */
    public function getPhoneNumbers(): ?array
    {
        return $this->fields['phone_numbers'] ?? null;
    }

    /**
     * @param null|CreateContactBodyPhoneNumbers[] $phoneNumbers
     */
    public function setPhoneNumbers(null|array $phoneNumbers): static
    {
        $phoneNumbers = $phoneNumbers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof CreateContactBodyPhoneNumbers ? $value : CreateContactBodyPhoneNumbers::from($value)) : null, $phoneNumbers) : null;

        $this->fields['phone_numbers'] = $phoneNumbers;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('email_addresses', $this->fields)) {
            $data['email_addresses'] = $this->fields['email_addresses'];
        }
        if (array_key_exists('phone_numbers', $this->fields)) {
            $data['phone_numbers'] = $this->fields['phone_numbers'];
        }

        return $data;
    }
}
