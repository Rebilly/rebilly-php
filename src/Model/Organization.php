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
use DateTimeInterface;
use JsonSerializable;

class Organization implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
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
        if (array_key_exists('taxDescriptor', $data)) {
            $this->setTaxDescriptor($data['taxDescriptor']);
        }
        if (array_key_exists('invoiceTimeZone', $data)) {
            $this->setInvoiceTimeZone($data['invoiceTimeZone']);
        }
        if (array_key_exists('questionnaire', $data)) {
            $this->setQuestionnaire($data['questionnaire']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
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

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|string $website): self
    {
        $this->fields['website'] = $website;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->fields['address'] ?? null;
    }

    public function setAddress(null|string $address): self
    {
        $this->fields['address'] = $address;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->fields['address2'] ?? null;
    }

    public function setAddress2(null|string $address2): self
    {
        $this->fields['address2'] = $address2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): self
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|string $region): self
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->fields['country'];
    }

    public function setCountry(string $country): self
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|string $postalCode): self
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
     * @param null|ContactPhoneNumbers[] $phoneNumbers
     */
    public function setPhoneNumbers(null|array $phoneNumbers): self
    {
        $phoneNumbers = $phoneNumbers !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ContactPhoneNumbers ? $value : ContactPhoneNumbers::from($value)) : null, $phoneNumbers) : null;

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
     * @param null|ContactEmails[] $emails
     */
    public function setEmails(null|array $emails): self
    {
        $emails = $emails !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ContactEmails ? $value : ContactEmails::from($value)) : null, $emails) : null;

        $this->fields['emails'] = $emails;

        return $this;
    }

    public function getTaxDescriptor(): ?string
    {
        return $this->fields['taxDescriptor'] ?? null;
    }

    public function setTaxDescriptor(null|string $taxDescriptor): self
    {
        $this->fields['taxDescriptor'] = $taxDescriptor;

        return $this;
    }

    public function getInvoiceTimeZone(): ?string
    {
        return $this->fields['invoiceTimeZone'] ?? null;
    }

    public function setInvoiceTimeZone(null|string $invoiceTimeZone): self
    {
        $this->fields['invoiceTimeZone'] = $invoiceTimeZone;

        return $this;
    }

    public function getQuestionnaire(): ?OrganizationQuestionnaire
    {
        return $this->fields['questionnaire'] ?? null;
    }

    public function setQuestionnaire(null|OrganizationQuestionnaire|array $questionnaire): self
    {
        if ($questionnaire !== null && !($questionnaire instanceof OrganizationQuestionnaire)) {
            $questionnaire = OrganizationQuestionnaire::from($questionnaire);
        }

        $this->fields['questionnaire'] = $questionnaire;

        return $this;
    }

    public function getSettings(): ?OrganizationSettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|OrganizationSettings|array $settings): self
    {
        if ($settings !== null && !($settings instanceof OrganizationSettings)) {
            $settings = OrganizationSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
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
            $data['phoneNumbers'] = $this->fields['phoneNumbers'];
        }
        if (array_key_exists('emails', $this->fields)) {
            $data['emails'] = $this->fields['emails'];
        }
        if (array_key_exists('taxDescriptor', $this->fields)) {
            $data['taxDescriptor'] = $this->fields['taxDescriptor'];
        }
        if (array_key_exists('invoiceTimeZone', $this->fields)) {
            $data['invoiceTimeZone'] = $this->fields['invoiceTimeZone'];
        }
        if (array_key_exists('questionnaire', $this->fields)) {
            $data['questionnaire'] = $this->fields['questionnaire']?->jsonSerialize();
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
